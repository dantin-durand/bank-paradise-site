<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    function addUserCommunity(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        Community::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('dashboard');
    }
}
