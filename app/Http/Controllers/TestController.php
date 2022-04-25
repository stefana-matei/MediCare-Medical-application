<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getUser()
    {
        /** @var User $user */
        $user = User::find(1);

        dd($user->visits()->where('patient_id', 2)->get());

    }
}
