<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionEmail;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $plan = Plan::where('id', $request->formule)->first();


        if ($request->filled('formule') && isset($plan)) {
            return view("auth.register3", [
                'intent' => $request->user()->createSetupIntent()
            ]);
        } else {
            return redirect()->route('register.step2');
        }
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

        try {
            $subscription = $request
                ->user()
                ->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);


            $subscriptionConfirmationParams = [
                'subject' => 'New Subscription',
                'user_id' => $request->user()->id,
                'user_firstname' => $request->user()->firstname,
                'user_lastname' => $request->user()->lastname,
            ];
            Mail::to('noreply@bank-paradise.com')->send(new SubscriptionEmail($subscriptionConfirmationParams));
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return redirect()->route('cashier.payment', [
                $e->payment->id, 'redirect' => route('payments.error')
            ]);
        }
        return view('payments.success');
        // return redirect()->route('register.step4');
    }
}
