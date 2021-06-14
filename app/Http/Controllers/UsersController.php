<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function renderUserInfo(Request $request)
    {
        $userDetails = User::firstWhere('id', $request->user()->id);
        return view('pages.dashboard.account', ["userDetails" => $userDetails]);
    }

    function updateUserInfo(Request $request)
    {
        $user = User::where('id', $request->user()->id);
        $user->update([
            'lastname' => $request->user()->lastname,
            'firstname' => $request->user()->firstname,
            'email' => $request->user()->email,
        ]);
    }

    function renderUserList(Request $request)
    {
        $userList = User::get();
        return view('pages.dashboard.admin.users', ['userList' => $userList]);
    }

    function deleteUser(Request $request)
    {
        $deletedArticle = User::firstWhere('id', $request->id);
        $deletedArticle->delete();
        return redirect()->route('adminUserList');
    }
}
