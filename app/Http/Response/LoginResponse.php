<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;


class LoginResponse implements LoginResponseContract
{

    private function getHome($request)
    {


        if (!isset(auth()->user()->stripe_id)) {
            return '/register/step2';
        } else if (isset(auth()->user()->stripe_id) && isset($request->user()->community_id)) {
            return '/admin/users';
        } else if (isset(auth()->user()->stripe_id) && !isset($request->user()->community_id)) {
            return '/register/step4';
        };
    }
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request): Response
    {
        $home = $this->getHome($request);

        return redirect()->intended($home);
    }
}
