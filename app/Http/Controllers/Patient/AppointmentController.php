<?php

namespace App\Http\Controllers\Patient;

use App\Models\Membership;
use App\Services\Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }


    /**
     * Create an appointment
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'medic_id' => 'required'
        ]);

        /** @var Carbon $date */
        $date = Carbon::createFromFormat('Y-m-d', $validated['date'])->endOfDay();

        if(!$date->isFuture()){
            return back()->withFail('Programarea nu poate fi creată cu dată din trecut!');
        }

        $user = Auth::user();

        /** @var Membership $membership */
        $membership = $user->memberships()->firstOrCreate([
            Membership::KEY_MEDIC => $validated['medic_id']
        ]);

        $membership->appointments()->create([
            'date' => $date,
            'doctor' => $membership->medic->name
        ]);

        return redirect()->route('appointments.list')->withSuccess('Programarea a fost creată cu succes!');
    }


    /**
     * Displays the form that creates an appointment
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function createView(Request $request): View|RedirectResponse
    {
        if($request->has('date')){
            return redirect()->route('appointments.createView')->withInput(['date' => $request->date]);
        }

        return view('authenticated.patient.appointments.create', [
            'memberships' => Auth::user()->memberships()->with('medic')->get()
        ]);
    }


    /**
     * TODO Not needed anymore
     * Displays an appointment
     *
     * @param $id
     * @return RedirectResponse
     */
    public function get($id)
    {
        return redirect()->route('visits.record.get', [
            'visit_id' => Auth::user()->appointments()->find($id)->visit->id
        ]);
    }


    /**
     * Displays a list of appointments
     *
     * @return View|Redirector
     *
     */
    public function list(Request $request)
    {
        if($request->has('medic') && is_null($request->medic)) {
            return redirect(route('appointments.list'));
        }

        $appointments = Auth::user()
            ->appointments()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media', 'visit.record');

        if ($request->medic) {
            $appointments->where('membership_id', $request->medic);
        }

        $appointments = $appointments->orderBy('date', 'asc')->get();

        $memberships = Auth::user()
            ->memberships()
            ->with('medic.settingsMedic.specialty')
            ->get();

        $now = now();

        return view('authenticated.patient.appointments.list', [
            'appointments' => $appointments->where('date', '<=', $now),
            'canceledAppointments' => $appointments->whereStrict('confirmed', 0),
            'pendingAppointments' => $appointments->where('date', '>=', $now)->whereStrict('confirmed', null),
            'confirmedAppointments' => $appointments->where('date', '>=', $now)->whereStrict('confirmed', 1),
            'memberships' => $memberships
        ]);
    }


    /**
     * Updates an appointment
     *
     * @param $id
     * @param Request $request
     * @return void
     */
    public function update($id, Request $request)
    {

    }


    /**
     * Displays the form that updates an appointment
     *
     * @return void
     */
    public function updateView()
    {

    }


    /**
     * Deletes an appointment
     *
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        Auth::user()->appointments()->find($id)->delete();

        return redirect()->back()->withSuccess('Programarea a fost anulată cu succes!');
    }

}
