<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getUser()
    {
        /** @var User $user */
        $user = User::find(2);

        return $user->memberships()->with('visits', 'visits.record')->get();
    }
}
