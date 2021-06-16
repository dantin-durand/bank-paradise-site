<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DateTime;

class ServicesController extends Controller
{

    function hasSubcriptionEnded($request)
    {
        $date = new DateTime();
        $subcriptionDate = $request->user()->subscriptions[0]->ends_at;
        return $date->getTimestamp() >= $subcriptionDate->getTimestamp();
    }

    function redirectUserOnLogin(Request $request)
    {

        $userCommunity = User::where('user_id', $request->user()->id)->first();
        dd($userCommunity);
        if (!isset($request->user()->stripe_id) || isset($request->user()->subscriptions[0]->ends_at) && $this->hasSubcriptionEnded($request)) {
            return redirect()->route('register.step2');
        }
        if (!isset($request->user()->community_id)) {
            return redirect()->route('register.step4');
        }
        return redirect()->route('admin.users');
    }


    function getLatestNews(Request $request)
    {
        $latestNews = Articles::take(5)->where('should_be_shown', 1)->orderBy('id', 'desc')->get();

        return view('pages.home', ['latestNews' => $latestNews]);
    }
}
