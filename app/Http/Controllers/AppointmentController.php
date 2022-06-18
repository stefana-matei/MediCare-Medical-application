<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use App\Services\Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'time' => 'required',
            'medic_id' => 'required'
        ]);

        // TODO Change midday
        /** @var Carbon $date */
        $date = Carbon::createFromFormat('Y-m-d H:i', $validated['date'] . ' ' . $validated['time']);

        if(!$date->isFuture()){
            return back()->withFail('Programarea nu poate fi creata cu data din trecut!');
        }
        $validated['date'] = $date;

        $user = Auth::user();

        /** @var Membership $membership */
        $membership = $user->memberships()->firstOrCreate([
            Membership::KEY_MEDIC => $validated['medic_id']
        ]);

        $membership->appointments()->create([
            'date' => $validated['date'],
            'doctor' => $membership->medic->name
        ]);

        return redirect()->route('appointments.list')->withSuccess('Programarea a fost creata cu succes!');
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
     * @return View
     *
     */
    public function list(Request $request)
    {
        if($request->has('medic') && is_null($request->medic)) {
            return redirect(route('appointments.list'));
        }

        $appointments = Auth::user()
            ->appointments()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media');

        if ($request->medic) {
            $appointments->where('membership_id', $request->medic);
        }

        $appointments = $appointments->orderBy('date', 'desc')->get();

        $memberships = Auth::user()
            ->memberships()
            ->with('medic.settingsMedic.specialty')
            ->get();

        $now = now();

        return view('authenticated.patient.appointments.list', [
            'appointments' => $appointments->where('date', '<=', $now),
            'futureAppointments' => $appointments->where('date', '>=', $now),
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

        return redirect()->back()->withSuccess('Programarea a fost anulata!');
    }

}
