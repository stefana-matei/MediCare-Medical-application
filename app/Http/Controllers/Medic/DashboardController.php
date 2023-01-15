<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Patient\Controller;
use App\Services\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $appointments = Auth::user()
            ->appointments()
            ->with('membership.patient.media')
            ->where('date', '>=', now())
            ->where('confirmed', true)
            ->get();

        return view('authenticated.medic.dashboard', compact('appointments'));
    }
}
