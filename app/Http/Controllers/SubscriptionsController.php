<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionsController extends Controller
{
    function renderSubscriptions(Request $request)
    {
        if ($request->filter === 'active') {
            $subscriptions = Subscription::query()->where('stripe_status', '=', 'active')->paginate(15);
        } else if ($request->filter === 'subscription') {
            $subscriptions = Subscription::query()->latest()->paginate(15);
        } else {
            $subscriptions = Subscription::query()->paginate(15);
        }

        return view('pages.dashboard.admin.subscriptions', ['subscriptions' => $subscriptions]);
    }
}
