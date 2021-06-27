<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionEmail;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function plans()
    {
        $allPlans = Plan::get();
        $finalPlans = [];
        foreach ($allPlans as $plan) {
            $tempArray = ["id" => $plan->id, "name" => $plan->name, "price" => number_format($plan->price / 100, 2, ',', ' ')];
            array_push($finalPlans, $tempArray);
        }
        return response()->json($finalPlans, 200);
    }

    public function intent(Request $request)
    {
        return response()->json($request->user()->createSetupIntent());
    }

    public function subscribe(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'plan' => 'required|exists:plans,id',
            'coupon' => 'nullable'
        ]);

        $plan = Plan::find($request->plan);

        try {
            $subscription = $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);

            $subscriptionConfirmationParams = [
                'subject' => 'New Subscription',
                'user_id' => $request->user()->id,
                'user_firstname' => $request->user()->firstname,
                'user_lastname' => $request->user()->lastname,
                'mail' => $request->user()->email,
                'name' => $request->user()->firstname . ' ' . $request->user()->lastname,
            ];
            Mail::to('noreply@bank-paradise.com')->send(new SubscriptionEmail($subscriptionConfirmationParams));

            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {

            return response()->json($e->payment);
        }
    }
}
