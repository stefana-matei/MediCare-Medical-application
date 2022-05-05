<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use App\Services\Auth;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class MembershipController extends Controller
{
    /**
     * @param $id
     * @return Collection
     */
    public function membershipsToId($id)
    {
        $user = Auth::user();
        $column = $user->getOtherMemberKey();

        return $user->memberships()
            ->with('patient', 'medic')
            ->where($column, $id)
            ->get();
    }


    /**
     * Creates a membership
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function create(Request $request): RedirectResponse
    {
        $email = $request->email;
        $user = Auth::user();

        if($email == $user->email) {
            return back()->withErrors(['email' => 'Nu te poti abona la tine insuti!']);
        }

        $member = User::where('email', $email)->first();

        if(is_null($member)){
            return back()->withErrors(['email' => 'Nu exista email-ul in BD!']);
        }

        $column = $user->getOtherMemberKey();

        $membership = $user->memberships()
            ->where($column, $member->id)
            ->first();

        if (is_null($membership)) {
            $user->memberships()->create([
                $column => $member->id
            ]);
        }

        return redirect()->route('memberships.list');
    }


    /**
     * Displays the form that creates a membership
     *
     * @return View
     */
    public function createView(): View
    {
        return view('authenticated.patient.memberships.create');
    }


    /**
     * Displays a membership
     *
     * @param $id
     * @return View
     */
    public function get($id): View
    {
        return view('authenticated.patient.memberships.get', [
            'membership' => Auth::user()->memberships()->with('medic', 'patient')->findOrFail($id)
        ]);
    }


    /**
     * List all memberships
     * Eager loads medic and patient
     *
     * @return View
     */
    public function list(): View
    {
        return view('authenticated.patient.memberships.list', [
            'memberships' => Auth::user()->memberships()->with('medic', 'patient')->get()
        ]);
    }


    /**
     * Deletes a membership
     *
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        Auth::user()->memberships()->findOrFail($id)->delete();

        return redirect()->back();
    }
}
