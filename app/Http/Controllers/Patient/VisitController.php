<?php

namespace App\Http\Controllers\Patient;

use App\Models\Membership;
use App\Models\User;
use App\Models\Visit;
use App\Services\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;


class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Creates a visit
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        /** @var Membership $membership */
        $membership = Auth::user()->memberships()->find($request->membership_id);

        if (is_null($membership)) {
            return back()->withErrors(['membership_id' => 'Nu poți crea vizită pentru această subscripție!']);
        }

        $membership->visits()->create(['date' => now()]);

        return redirect()->route('visits.list');
    }


    /**
     * Displays the form that creates a visit
     *
     * @return View
     */
    public function createView()
    {
        return view('authenticated.patient.visits.create', [
            'memberships' => Auth::user()->memberships()->with('medic')->get()
        ]);
    }


    /**
     * Displays a visit
     *
     * @param $id
     * @return View
     */
    public function get($id)
    {
        return view('authenticated.patient.visits.get', [
            'visit' => Auth::user()->visits()->find($id)
        ]);
    }


    /**
     * Displays a list of visits
     *
     * @return View|Redirector
     */
    public function list(Request $request)
    {
        if ($request->has('medic') && is_null($request->medic)) {
            return redirect(route('visits.list'));
        }

        $medic = null;

        $visits = Auth::user()
            ->visits()
            ->with('membership.medic.settingsMedic.specialty', 'membership.medic.media', 'record');

        if ($request->medic) {
            $visits->where('membership_id', $request->medic);
            $medic = User::find($request->medic);
        }

        $visits = $visits
            ->orderBy('date', 'desc')
            ->get();

        $memberships = Auth::user()
            ->memberships()
            ->with('medic.settingsMedic.specialty')
            ->get();

        return view('authenticated.patient.visits.list', [
            'visits' => $visits,
            'memberships' => $memberships,
            'medic' => $medic
        ]);
    }


    /**
     * Updates a visit
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        return Visit::find($id)->update($request->all());
    }


    /**
     * Displays the form that updates a visit
     *
     * @param $id
     * @return void
     */
    public function updateView()
    {
        //
    }


    /**
     * Deletes a visit
     *
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        Auth::user()->visits()->find($id)->delete();

        return redirect()->back();
    }

}
