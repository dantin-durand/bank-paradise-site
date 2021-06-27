<?php

namespace App\Http\Controllers;

use App\Mail\CustomerCareConfirmationMail;
use App\Mail\CustomerCareMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        } else if (!isset($request->user()->community->name)) {
            return redirect()->route('register.step4');
        }
        return redirect()->route('dashboard');
    }

    function sendmail(Request $request)
    {

        $customerCareParams = [
            'subject' => $request->object,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'body' => $request->body,
            'name' => $request->firstname . ' ' . $request->lastname,
            'mail' => $request->email,
        ];

        $confirmationEmailSent = [
            'subject' => 'Customer Support : Email Confirmation ',
        ];
        Mail::to('noreply@bank-paradise.com')->send(new CustomerCareMail($customerCareParams));
        Mail::to($request->email)->send(new CustomerCareConfirmationMail($confirmationEmailSent));

        return redirect()->route('contact');
    }
}
