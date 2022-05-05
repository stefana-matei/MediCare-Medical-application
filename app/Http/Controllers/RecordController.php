<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Services\Auth;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // create
    public function create($visit_id, Request $request)
    {
        if(Auth::user()->isPatient()){
            return back()->withErrors(['email' => 'Nu puteti crea fisa medicala ca pacient!']);
        }

        $validated = $request->validate([
            'file_name' => 'string|max:255'
        ]);

        $visit = Auth::user()->visits()->find($visit_id);

        if(is_null($visit)){
            return back()->withErrors(['email' => 'Nu exista aceasta vizita!']);
        }

        $visit->record()->create($validated);

        return redirect()->route('visits.list');
    }

    public function createView($visit_id)
    {
        return view('authenticated.patient.records.create', [
            'visit_id' => $visit_id
        ]);
    }

    // get
    public function get($id)
    {
        return view('authenticated.patient.records.get', [
            'record' => Auth::user()->visits()->with('record')->find($id)->record
        ]);
    }

    // list
    public function list()
    {
        return Record::all();
    }

    // update
    public function update($id, Request $request)
    {
        return Record::find($id)->update($request->all());
    }

    // delete
    public function delete($visit_id)
    {
        $visit = Auth::user()->visits()->with('record')->find($visit_id);

        $visit->record->delete();

        return redirect()->route('visits.list');
    }
}
