<?php

namespace App\Http\Controllers;

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
        dd($request);
    }
}
