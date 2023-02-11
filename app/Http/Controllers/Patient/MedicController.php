<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MedicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get($id)
    {
        $medic = User::medic()->with('settingsMedic')->findOrFail($id);

        return view('authenticated.patient.medics.get', compact('medic'));
    }


    public function list(Request $request)
    {
        if ($request->has('medic') && is_null($request->medic)) {
            return redirect(route('medics.list'));
        }

        /** @var Collection $medics */
        $medics = User::medic()
            ->with('media', 'settingsMedic.specialty', 'settingsMedic.level')
            ->get();

        $allMedics = $medics;

        if ($request->medic) {
            $medics = $medics->where('id', $request->medic);
        }

        return view('authenticated.patient.medics.list', [
            'medics' => $medics,
            'allMedics' => $allMedics
        ]);
    }

    public function myMedics(Request $request)
    {
        if ($request->has('medic') && is_null($request->medic)) {
            return redirect(route('medics.myMedics'));
        }

        $allMedics = Auth::user()
            ->visits()
            ->with('membership.medic', 'membership.medic.media', 'membership.medic.settingsMedic.specialty', 'membership.medic.settingsMedic.level', 'record')
            ->get()
            ->pluck('membership.medic')
            ->unique('id');

        $medics = $allMedics;

        if ($request->medic) {
            $medics = $medics->where('id', $request->medic);
        }

        return view('authenticated.patient.memberships.list', [
            'medics' => $medics,
            'allMedics' => $allMedics
        ]);
    }
}
