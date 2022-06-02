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
            'medic_id' => 'required'
        ]);

        $user = Auth::user();

        /** @var Membership $membership */
        $membership = $user->memberships()->firstOrCreate([
            Membership::KEY_MEDIC => $validated['medic_id']
        ]);

        // TODO Change midday
        $validated['date'] = Carbon::createFromFormat('Y-m-d', $validated['date'])->midDay();


        $membership->appointments()->create([
            'date' => $validated['date'],
            'doctor' => $membership->medic->name
        ]);

        return back()->withSuccess('Programarea a fost creata cu succes!');
    }


    /**
     * Displays the form that creates an appointment
     *
     * @return View
     */
    public function createView(): View
    {
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

        $appointments = $appointments->get();

        $memberships = Auth::user()
            ->memberships()
            ->with('medic.settingsMedic.specialty')
            ->get();

        $now = now();

        return view('authenticated.patient.appointments.list', [
            'appointments' => $appointments->where('date', '<=', $now),
            'futureAppointments' => $appointments->where('date', '>=', $now),
            'memberships' => $memberships,
            'medics' => User::with('settingsMedic.specialty')->medic()->get()
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

        return redirect()->back();
    }

}
