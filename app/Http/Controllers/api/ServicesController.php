<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerCareMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ServicesController extends Controller
{

    public function contactSupport(Request $request)
    {

        $request->validate([
            'object' => 'required',
            'email' => 'required|email',
            'lastname' => 'required',
            'firstname' => 'required',
            'body' => 'required',
        ]);

        $customerCareParams = [
            'subject' => $request->object,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'body' => $request->body,
            'name' => $request->firstname . ' ' . $request->lastname,
            'mail' => $request->email,
        ];

        Mail::to("noreply@bank-paradise.com")->send(new CustomerCareMail($customerCareParams));

        return response()->json(['message' => 'Message was sent to customer care'], 200);
    }

    public function getContactInfo(Request $request)
    {
        $configs = Config::get('informations');
        $contactInfo = [
            'address' => $configs['address_contact'],
            'phone' => $configs['phone_contact'],
            'email' => $configs['mail_contact'],
        ];

        return response()->json(['configs' => $contactInfo], 200);
    }
}
