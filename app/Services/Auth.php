<?php

namespace App\Services;

use App\Models\User;

class Auth
{
    /**
     * @return User
     */
    public static function user()
    {
        return Auth::user();
    }
}
