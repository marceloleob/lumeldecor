<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Return user auth check
     *
     * @return boolean
     */
    public static function check()
    {
        return Auth::check();
    }

    /**
     * Return users id auth
     *
     * @return integer
     */
    public static function getUserIdAuth()
    {
        return Auth::id() ?? false;
    }
}
