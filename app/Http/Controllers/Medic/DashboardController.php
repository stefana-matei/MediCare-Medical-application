<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Patient\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('authenticated.medic.dashboard');
    }
}
