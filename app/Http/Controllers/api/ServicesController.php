<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerCareMail;
use Illuminate\Http\Request;
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
            'subject' => 'Customer Care',
            'object' => $request->object,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'body' => $request->body,
        ];

        Mail::to("noreply@bank-paradise.com")->send(new CustomerCareMail($customerCareParams));

        return response()->json(['message' => 'Message was sent to customer care'], 200);
    }
}
