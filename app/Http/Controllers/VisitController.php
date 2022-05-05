<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\Auth;
use Illuminate\View\View;


class VisitController extends Controller
{
    /**
     * Creates a visit
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        /** @var Membership  $membership */
        $membership = Auth::user()->memberships()->find($request->membership_id);

        if(is_null($membership)){
            return back()->withErrors(['membership_id' => 'Nu poti crea vizita pentru aceasta subscriptie!']);
        }

        $membership->visits()->create([ 'date' => now() ]);

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
     * @return View
     */
    public function list()
    {
        return view('authenticated.patient.visits.list', [
            'visits' => Auth::user()->visits()->with('membership', 'membership.medic', 'record')->get()
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
