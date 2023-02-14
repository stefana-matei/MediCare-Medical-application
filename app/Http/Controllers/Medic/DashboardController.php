<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:medic');
    }

    public function dashboard()
    {
        return view('authenticated.medic.dashboard');
    }
}
