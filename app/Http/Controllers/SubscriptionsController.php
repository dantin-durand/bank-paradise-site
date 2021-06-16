<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionsController extends Controller
{
    function renderSubscriptions(Request $request)
    {
        $subscriptions = Subscription::query()->pagination(15);
        return view('pages.dashboard.admin.subscriptions', ['subscriptions' => $subscriptions]);
    }
}
