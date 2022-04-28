<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    // create
    public function create(Request $request)
    {
        return Diagnostic::create($request->all());
    }

    // get
    public function get($id)
    {
        return Diagnostic::find($id);
    }

    // list
    public function list()
    {
        return Diagnostic::all();
    }

    // update
    public function update($id, Request $request)
    {
        return Diagnostic::find($id)->update($request->all());
    }

    // delete
    public function delete($id)
    {
        Diagnostic::find($id)->delete();
    }
}
