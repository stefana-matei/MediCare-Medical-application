<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Services\Auth;
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
        /** @var Membership  $membership */
        $membership = Auth::user()->memberships()->find($request->membership_id);

        $membership->appointments()->create([
            'date' => now(),
            'doctor' => $membership->medic->name,
            'specialization' => 'Urology',
            'honored' => true
        ]);

        return redirect()->route('appointments.list');
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
    public function list(): View
    {
        return view('authenticated.patient.appointments.list', [
            'appointments' => Auth::user()->appointments()->with('membership', 'membership.medic')->get()
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
