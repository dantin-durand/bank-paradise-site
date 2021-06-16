<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // renderContact
    function renderContact(Request $request)
    {
        $configs = Config::get('informations');
        $configs_info = [
            'address' => $configs['address_contact'],
            'phone' => $configs['phone_contact'],
            'mail' => $configs['mail_contact'],
            'lat' => $configs['lat'],
            'lng' => $configs['lng'],
            'api_key' => env('MAP_API_KEY', null),
        ];
        return view('pages.contact', $configs_info);
    }
}
