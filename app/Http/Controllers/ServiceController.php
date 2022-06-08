<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

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
