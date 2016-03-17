<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/17/2016
 * Time: 2:33 PM
 */
namespace App;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}