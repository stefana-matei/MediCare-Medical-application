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

        $memberships = Auth::user()
            ->memberships()
            ->with('patient', 'patient.media', 'patient.settingsPatient')
            ->get();

        $allPatients = $memberships
            ->pluck('patient')
            ->unique('id');

        if ($request->patient) {
            $memberships = $memberships->where('patient.id', $request->patient);
        }

        return view('authenticated.medic.memberships.list', [
            'memberships' => $memberships,
            'allPatients' => $allPatients
        ]);
    }

    public function history(int $membershipId, Request $request)
    {
        $membership = Auth::user()->memberships()
            ->with('visits.record', 'appointments')
            ->find($membershipId);

        return view('authenticated.medic.memberships.history', [
            'patient' => $membership->patient
        ]);
    }
}
