<?php

namespace App\Http\Controllers\Patient;

use App\Models\Service;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        $services = Service::with('users.media')->get();
        return view('authenticated.patient.services.list', compact('services'));
    }
}
