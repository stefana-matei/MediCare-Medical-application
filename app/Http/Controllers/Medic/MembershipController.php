<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create($id)
    {
        $patientId = intval($id);

        $patient = User::patient()->find($patientId);

        if (is_null($patient)) {
            session()->flash('fail', 'Pacientul nu a putut fi găsit!');
            return redirect()->route('medic.patients.list');
        }

        Auth::user()->memberships()->firstOrCreate([
            Membership::KEY_PATIENT => $patientId
        ]);

        session()->flash('success', 'Pacientul a fost adăugat cu success!');
        return redirect()->route('medic.patients.list');
    }

    public function list(Request $request)
    {
        if ($request->has('patient') && is_null($request->patient)) {
            return redirect(route('medic.patients.list'));
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

}
