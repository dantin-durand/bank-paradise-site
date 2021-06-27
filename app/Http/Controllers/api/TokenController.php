<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\CustomerCareMail;
use App\Mail\RegistrationMail;
use App\Models\Articles;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use DateTime;
use Illuminate\Support\Facades\Config;

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

        $mailParams = [
            'subject' => 'Bank-Paradise: Enregistrement',
            'mail' => $request->email,
            'name' => $request->firstname . ' ' . $request->lastname,
        ];

        Mail::to('noreply@bank-paradise.com')->send(new RegistrationMail($mailParams));;

        if (!isset($user->stripe_id) || isset($user->subscriptions[0]->ends_at) && $this->hasSubcriptionEnded($user)) {
            $current_step = 2;
        } else if (!isset($user->community->name)) {
            $current_step = 4;
        } else {
            $current_step = 0;
        }


        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            "token" => $token,
            "user" => $user,
            "current_step" => $current_step,
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
        $hasSuccedded = $request->user()->currentAccessToken()->delete();


        if ($hasSuccedded) {
            return response()->json(null, 204);
        }
        return response()->json(['message' => 'Could not logout user because he was not authenticated'], 401);
    }

    public function currentSubscription(Request $request)
    {
        if (empty($request->user()->stripe_id)) {
            return response()->json([
                "message" => "Abonnement introuvable.",
            ], 404);
        }

        $planDetails = Plan::where('stripe_id', $request->user()->subscriptions[0]->stripe_plan)->first();

        $stripe_url = $request->user()->billingPortalUrl('https://bank-paradise-application.web.app/account');

        if ($request->user()->subscriptions[0]->ends_at) {
            $ends_at = date_format($request->user()->subscriptions[0]->ends_at, 'd/m/Y');
        } else {
            $ends_at = null;
        }
        return response()->json([
            "stripe_url" => $stripe_url,
            "plan" => [
                "name" => $planDetails->name,
                "price" => number_format($planDetails->price / 100, 2, ',', ' ') . "€",
                "created_at" => date_format($request->user()->subscriptions[0]->created_at, 'd/m/Y'),
                "ends_at" => $ends_at
            ]
        ], 200);
    }
}
