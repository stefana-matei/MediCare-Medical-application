<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        if($request->has('medic') && is_null($request->medic)) {
            return redirect(route('medics.list'));
        }

        $medics = User::medic()->with('media', 'settingsMedic.specialty', 'settingsMedic.level');

        if ($request->medic) {
            $medics->where('id', $request->medic);
        }

        $medics = $medics->get();

        return view('authenticated.patient.medics.list', compact('medics'));
    }
}
