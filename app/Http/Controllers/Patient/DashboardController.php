<?php

namespace App\Http\Controllers\Patient;

use App\Services\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }


    /**
     * @return View
     */
    public function dashboard()
    {
        $appointments = Auth::user()
            ->appointments()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media')
            ->where('date', '>=', now())
            ->where('confirmed', true)
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
            'confirmedAppointments' => $appointments,
            'visits' => $visits
        ]);
    }
}
