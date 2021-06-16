<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    function renderUserInfo(Request $request)
    {
        $userDetails = User::firstWhere('id', $request->user()->id);
        return view('pages.dashboard.account', ["userDetails" => $userDetails]);
    }

    function updateUser(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->user()->id === $request->id || $request->user()->is_admin) {
            $user = User::where('id', $request->user()->id);

            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        if ($request->user()->is_admin) {
            return redirect()->route('admin.users');
        } else {
            return redirect()->route('account');
        }
    }

    function renderUserList(Request $request)
    {
        $userList = User::get();
        return view('pages.dashboard.admin.users', ['userList' => $userList]);
    }


    function renderUserEditForm(Request $request)
    {
        $userInfo = User::firstWhere('id', $request->user()->id);
        return view('pages.dashboard.settings', ['userInfo' => $userInfo]);
    }


    function renderUserAdminEditForm(Request $request)
    {
        if ($request->user()->is_admin) {
            $userInfo = User::firstWhere('id', $request->user()->id);
            return view('pages.dashboard.settings', ['userInfo' => $userInfo]);
        } else {
            return redirect()->route('admin.users');
        }
    }

    function deleteUser(Request $request)
    {
        $deletedArticle = User::firstWhere('id', $request->id);
        $deletedArticle->delete();
        return redirect()->route('admin.users');
    }


    function renderUserDetails(Request $request)
    {
        if ($request->user()->is_admin) {
            $userDetails = User::firstWhere('id', $request->user()->id);
            return view('pages.dashboard.account', ["userDetails" => $userDetails]);
        } else {
            return redirect()->route('admin.users');
        }
    }
}
