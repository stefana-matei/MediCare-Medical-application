<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getUser()
    {
        /** @var User $user */
        $user = User::find(3);



        dd($user->isMedic(), $user->isPatient());
    }
}
