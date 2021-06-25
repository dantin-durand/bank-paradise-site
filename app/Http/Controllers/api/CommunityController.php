<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    function createCommunity(Request $request)
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

        $community = Community::where('name', $request->name)->get();
        return response()->json(['message' => 'Successfuly created community', 'community' => $community], 200);
    }
}
