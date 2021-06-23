<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use DateTime;

class TokenController extends Controller
{
    function hasSubcriptionEnded($user)
    {
        $date = new DateTime();
        $subcriptionDate = $user->subscriptions[0]->ends_at;
        return $date->getTimestamp() >= $subcriptionDate->getTimestamp();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "error" => "Adresse mail/mot de passe invalide."
            ], 401);
        }

        $user->tokens()->where('tokenable_id',  $user->id)->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        if (!isset($user->stripe_id) || isset($user->subscriptions[0]->ends_at) && $this->hasSubcriptionEnded($user)) {
            $current_step = 2;
        } else if (!isset($user->community->name)) {
            $current_step = 4;
        } else {
            $current_step = 0;
        }

        return response()->json([
            "token" => $token,
            "user" => $user,
            "current_step" => $current_step,
        ], 200);
    }


    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json(["error" => "Vous vous êtes déjà enregistré, connectez-vous."], 409);
        }
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Mail::to($request->email)
        //     ->subject('Bank-Paradise: Enregistrement')
        //     ->send(new RegistrationMail());

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            "token" => $token,
            "user" => $user
        ], 201);
    }

    public function account(Request $request)
    {
        return response()->json([
            $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }

    // public function contactSupport(Request $request)
    // {
    //     Mail::to($request->email)
    //         ->subject('Bank-Paradise: Enregistrement')
    //         ->send(new CustomerCareMail());;
    // }

    // public function getNews(Request $request)
    // {
    //     $newsList = Articles::get();

    //     return response()->json($newsList, 200);
    // }
}
