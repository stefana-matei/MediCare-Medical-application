<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Services\Auth;
use Carbon\Carbon;
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
            'memberships' => $memberships,
            'timeslots' => $this->getTimeslots()
        ]);
    }


    /**
     * Builds the time slots for appointment time selector
     *
     * @return array
     */
    private function getTimeslots()
    {
        $slot_duration = 30;

        $start_date = Carbon::today()->setTime(9, 0, 0);
        $end_date = Carbon::today()->setTime(17, 0, 0)->subMinutes($slot_duration);

        $times = [];
        $slots = $start_date->diffInMinutes($end_date) / $slot_duration;

        // First time
        $times[] = [
            'start' => $start_date->format('H:i'),
            'end' => $start_date->copy()->addMinutes($slot_duration)->format('H:i'),
        ];

        for ($i = 1; $i <= $slots; $i++) {
            // Adding each additional to the list
            $times[] = [
                'start' => $start_date->addMinutes($slot_duration)->format('H:i'),
                'end' => $start_date->copy()->addMinutes($slot_duration)->format('H:i')
            ];
        }

        return $times;
    }


    /**
     * Refuse appointment
     *
     * @param int $id
     * @return mixed
     */
    public function refuse(int $id)
    {
        $appointment = Auth::user()->appointments()->find($id);

        if (is_null($appointment)) {
            return back()->withFail('Nu s-a putut sterge programarea!');
        }

        $appointment->update([
            'confirmed' => false
        ]);

        return back()->withSuccess('Programarea a fost refuzata!');
    }


    public function accept(int $id, Request $request)
    {
        $timeslot = $request->get('timeslot');
        $timeslot = explode(':', $timeslot);

        $appointment = Auth::user()->appointments()->find($id);

        if (is_null($appointment)) {
            return back()->withFail('Nu a fost gasita programarea!');
        }

        $appointment->update([
            'confirmed' => true,
            'date' => $appointment->date->hour($timeslot[0])->minute($timeslot[1])->second(0)
        ]);

        return back()->withSuccess('Programarea a fost acceptata cu succes!');
    }


    public function updateView(int $id, Request $request)
    {
        $appointment = Auth::user()->appointments()->with('membership.patient.media', 'visit.record')->find($id);


        return view('authenticated.medic.appointments.update', [
            'appointment' => $appointment
        ]);
    }

    public function update(int $id, Request $request)
    {
        $appointment = Auth::user()->appointments()->find($id);

        $validated = $request->validate([
            'confirmed' => '',
            'honored' => ''
        ]);

        if($validated['confirmed'] === 'null') {
            $validated['confirmed'] = null;
        }

        $appointment->update([
            'confirmed' => $validated['confirmed'],
            'honored' => $validated['honored']
        ]);

        return back()->withSuccess('Programarea a fost actualizata');
    }

}
