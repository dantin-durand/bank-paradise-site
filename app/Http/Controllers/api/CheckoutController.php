<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

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

        $plan = Plan::find(1);

        try {
            $subscription = $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
