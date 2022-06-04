<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function get($id)
    {
        $medic = User::medic()->findOrFail($id);

        return view('authenticated.patient.medics.get', compact('medic'));
    }

    public function list()
    {
        $medics = User::medic()->with('media', 'settingsMedic.specialty')->get();

        return view('authenticated.patient.medics.list', compact('medics'));
    }
}
