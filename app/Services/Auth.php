<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadeAuth;

class Auth
{
    /**
     * @return User
     */
    public static function user()
    {
        return FacadeAuth::user();
    }
}
