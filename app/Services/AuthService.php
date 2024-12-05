<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($request)
    {

        $credentials = $request->only('email', 'password');


        if (!Auth::attempt($credentials)) {
            throw new \Exception("Kredensial tidak valid", 401);
        } else {

            $request->session()->regenerate();
        }
    }

    public function logout()
    {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
