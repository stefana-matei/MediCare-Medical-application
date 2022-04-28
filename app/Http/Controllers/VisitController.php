<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    // create
    public function create(Request $request)
    {
        return Visit::create($request->all());
    }

    // get
    public function get($id)
    {
        return Visit::find($id);
    }

    // list
    public function list()
    {
        return Visit::all();
    }

    // update
    public function update($id, Request $request)
    {
        return Visit::find($id)->update($request->all());
    }

    // delete
    public function delete($id)
    {
        Visit::find($id)->delete();
    }

}
