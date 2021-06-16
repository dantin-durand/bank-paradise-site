<?php

namespace App\Http\Controllers;

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

        if (!isset($request->user()->stripe_id) || isset($request->user()->subscriptions[0]->ends_at) && $this->hasSubcriptionEnded($request)) {
            return redirect()->route('register.step2');
        }
        if (!isset($request->user()->community_id)) {
            return redirect()->route('register.step4');
        }
        return redirect()->route('admin.users');
    }
}
