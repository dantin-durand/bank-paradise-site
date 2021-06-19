<?php

namespace App\Http\Controllers;

use App\Mail\CustomerCareConfirmationMail;
use App\Mail\CustomerCareMail;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
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

    function sendEmail(Request $request)
    {

        $customerCareParams = [
            'subject' => 'Customer Mail',
            'object' => $request->object,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
        ];

        $confirmationEmailSent = [
            'subject' => 'Customer Support : Email Confirmation ',
        ];
        Mail::to()->send(new CustomerCareMail($customerCareParams));
        Mail::to($request->user()->email)->send(new CustomerCareConfirmationMail($confirmationEmailSent));;
    }
}
