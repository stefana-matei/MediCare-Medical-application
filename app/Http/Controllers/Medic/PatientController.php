<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Services\Auth;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myPatients()
    {
        $patients = Auth::user()
            ->visits()
            ->with('membership.patient','membership.patient.media','membership.patient.settingsPatient')
            ->get()
            ->pluck('membership.patient')
            ->unique('id');

        return view('authenticated.medic.memberships.list', [
            'patients' => $patients
        ]);

    }
}
