<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    function renderUserInfo(Request $request)
    {
        $userDetails = User::firstWhere('id', $request->user()->id);
        $planDetails = Plan::where('stripe_id', $userDetails->subscriptions[0]->stripe_plan)->first();

        return view('pages.dashboard.account', ["userDetails" => $userDetails, "planDetails" => $planDetails]);
    }

    function updateUser(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->user()->id === $id || $request->user()->is_admin) {
            $user = User::where('id', $id);

            if ($request->user()->is_admin && $request->is_admin) {
                $is_admin = $request->is_admin == "on" ? 1 : 0;
            } else {
                $is_admin = 0;
            }
            // dd($request->all());
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $is_admin
            ]);
        }
        if ($request->user()->is_admin) {
            return redirect()->route('admin.users')->with('success', 'Utilisateur modifié avec succès');
        } else {
            return redirect()->route('account');
        }
    }

    function renderUserList(Request $request)
    {
        if ($request->user()->is_admin) {
            $userList = User::get();
            return view('pages.dashboard.admin.users', ['userList' => $userList]);
        } else {
            return redirect()->route('account');
        }
    }


    function renderUserEditForm(Request $request)
    {
        $userInfo = User::firstWhere('id', $request->user()->id);
        return view('pages.dashboard.settings', ['userInfo' => $userInfo]);
    }


    function renderUserAdminEditForm(Request $request, $id)
    {
        if ($request->user()->is_admin) {
            $userInfo = User::firstWhere('id', $id);
            return view('pages.dashboard.settings', ['userInfo' => $userInfo]);
        } else {
            return redirect()->route('account');
        }
    }

    function deleteUser(Request $request)
    {
        if ($request->user()->is_admin) {
            $deletedArticle = User::firstWhere('id', $request->id);
            if (isset($deletedArticle)) {
                $deletedArticle->delete();
                return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
            }
            return redirect()->route('admin.users')->with('error', 'Utilisateur introuvable.');
        } else {
            return redirect()->route('acccount');
        }
    }


    function renderUserDetails(Request $request, $id)
    {
        if ($request->user()->is_admin) {
            $userDetails = User::firstWhere('id', $id);
            if (isset($userDetails->subscriptions[0]->stripe_plan)) {
                $planDetails = Plan::where('stripe_id', $userDetails->subscriptions[0]->stripe_plan)->first();
            } else {
                $planDetails = [];
            }

            return view('pages.dashboard.account', ["userDetails" => $userDetails, "planDetails" => $planDetails]);
        } else {
            return redirect()->route('account');
        }
    }
}
