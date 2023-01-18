<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class Medic AppointmentController
 * @package App\Http\Controllers\Medic
 */
class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Displays a list of appointments
     *
     * @return View|Redirector
     *
     */
    public function list(Request $request)
    {
        if ($request->has('patient') && is_null($request->patient)) {
            return redirect(route('medic.appointments.list'));
        }

        $appointments = Auth::user()
            ->appointments()
            ->with('membership.patient.media');

        if ($request->patient) {
            $appointments->where('membership_id', $request->patient);
        }

        $appointments = $appointments->orderBy('date', 'asc')->get();

        $memberships = Auth::user()
            ->memberships()
            ->with('patient.media', 'patient.settingsPatient')
            ->get();

        $now = now();

        return view('authenticated.medic.appointments.list', [
            'appointments' => $appointments->where('date', '<=', $now),
            'canceledAppointments' => $appointments->whereStrict('confirmed', 0),
            'pendingAppointments' => $appointments->where('date', '>=', $now)->whereStrict('confirmed', null),
            'confirmedAppointments' => $appointments->where('date', '>=', $now)->whereStrict('confirmed', 1),
            'memberships' => $memberships
        ]);
    }
}
