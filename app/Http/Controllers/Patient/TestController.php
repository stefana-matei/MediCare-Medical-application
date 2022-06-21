<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;

class TestController extends Controller
{
    public function getUser()
    {
        /** @var User $user */
        $user = User::find(2);

        return $user->memberships()->with('visits', 'visits.record')->get();
    }
}
