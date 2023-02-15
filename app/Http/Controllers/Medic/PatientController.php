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
        $this->middleware('role:medic');
    }

    public function history(int $membershipId, Request $request)
    {
        $membership = Auth::user()->memberships()
            ->with('visits.record')
            ->find($membershipId);

        return view('authenticated.medic.memberships.history', [
            'patient' => $membership->patient,
            'visits' => $membership->visits->sortByDesc('date')
        ]);
    }
}
