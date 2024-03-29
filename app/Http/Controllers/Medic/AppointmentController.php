<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Services\Auth;
use App\Services\Calendar;
use Illuminate\Http\RedirectResponse;
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
        $this->middleware('role:medic');
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
            'memberships' => $memberships,
            'timeslots' => Calendar::getTimeslots()
        ]);
    }


    /**
     * Refuse appointment
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function refuse(int $id)
    {
        $appointment = Auth::user()->appointments()->find($id);

        if (is_null($appointment)) {
            return back()->withFail('Nu s-a putut șterge programarea!');
        }

        $appointment->update([
            'confirmed' => false
        ]);

        return back()->withSuccess('Programarea a fost refuzată!');
    }


    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function accept(int $id, Request $request)
    {
        $timeslot = $request->get('timeslot');
        $timeslot = explode(':', $timeslot);

        $appointment = Auth::user()->appointments()->find($id);

        if (is_null($appointment)) {
            return back()->withFail('Nu a fost găsită programarea!');
        }

        $appointment->update([
            'confirmed' => true,
            'date' => $appointment->date->hour($timeslot[0])->minute($timeslot[1])->second(0)
        ]);

        return back()->withSuccess('Programarea a fost confirmată cu succes!');
    }

    /**
     * @param int $id
     * @return View
     */
    public function updateView(int $id)
    {
        $appointment = Auth::user()
            ->appointments()
            ->with('membership.patient.media', 'visit.record')
            ->find($id);

        session()->flashInput(['date' => $appointment->date->format('d-m-Y')]);

        return view('authenticated.medic.appointments.update', [
            'appointment' => $appointment
        ]);
    }

    /**
     * @param int $id
     * @param $attributes
     * @return RedirectResponse
     */
    public function update(int $id, $attributes = [])
    {
        $appointment = Auth::user()->appointments()->find($id);

        $appointment->update([
            'confirmed' => $attributes['confirmed'],
            'honored' => $attributes['honored'],
            'date' => $attributes['date']
        ]);

        session()->flash('success', 'Programarea a fost actualizată!');
        return redirect()->route('medic.appointments.list');
    }

    /**
     * @return View
     */
    public function createView()
    {
        return view('authenticated.medic.appointments.create');
    }
}
