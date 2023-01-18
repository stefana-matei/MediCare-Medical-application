<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Services\Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myPatients(Request $request)
    {
        if ($request->has('patient') && is_null($request->patient)) {
            return redirect(route('patients.myPatients'));
        }

        $allPatients = Auth::user()
            ->visits()
            ->with('membership.patient', 'membership.patient.media', 'membership.patient.settingsPatient')
            ->get()
            ->pluck('membership.patient')
            ->unique('id');

        $patients = $allPatients;

        if ($request->patient) {
            $patients = $patients->where('id', $request->patient);
        }

        return view('authenticated.medic.memberships.list', [
            'patients' => $patients,
            'allPatients' => $allPatients
        ]);
    }
}
