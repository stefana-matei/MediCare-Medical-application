<?php

namespace App\Http\Controllers;

use App\Services\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if (Auth::user()->isMedic()) {
            return $this->medicDashboard();
        } else {
            return $this->patientDashboard();
        }
    }

    private function medicDashboard()
    {
        return view('authenticated.medic.dashboard');

    }

    private function patientDashboard()
    {
        $appointments = Auth::user()
            ->appointments()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media')
            ->where('date', '>=', now())
            ->take(3)
            ->orderBy('date')
            ->get();

        $visits = Auth::user()
            ->visits()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media', 'record')
            ->take(2)
            ->orderBy('date', 'desc')
            ->get();


        return view('authenticated.patient.dashboard', [
            'futureAppointments' => $appointments,
            'visits' => $visits
        ]);
    }
}
