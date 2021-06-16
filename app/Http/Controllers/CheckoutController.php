<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        return view("auth.register3", [
            'intent' => $request->user()->createSetupIntent()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'plan' => 'required|exists:plans,id',
            'coupon' => 'nullable'
        ]);

        $plan = Plan::find($request->plan);

        dd($request);

        try {
            $subscription = $request
                ->user()
                ->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return redirect()->route('cashier.payment', [
                $e->payment->id, 'redirect' => route('payments.error')
            ]);
        }

        if (isset($subscription)) {
            //TODO SEND MAIL
        }


        return redirect()->route('register.step4');
    }
}
