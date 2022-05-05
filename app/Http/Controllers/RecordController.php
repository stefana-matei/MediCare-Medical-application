<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Services\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecordController extends Controller
{
    /**
     * Creates a record
     *
     * @param $visit_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function create($visit_id, Request $request): RedirectResponse
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


    /**
     * Displays the form that creates a record
     *
     * @param $visit_id
     * @return View
     */
    public function createView($visit_id): View
    {
        return view('authenticated.patient.records.create', [
            'visit_id' => $visit_id
        ]);
    }


    /**
     * Displays a record
     *
     * @param $id
     * @return View
     */
    public function get($id): View
    {
        return view('authenticated.patient.records.get', [
            'record' => Auth::user()->visits()->with('record')->find($id)->record
        ]);
    }


    /**
     * List all records
     *
     * @return Record[]|Collection
     */
    public function list()
    {
        return Record::all();
    }

    /**
     * Updates a record
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        return Record::find($id)->update($request->all());
    }


    /**
     * Deletes a record
     *
     * @param $visit_id
     * @return RedirectResponse
     */
    public function delete($visit_id): RedirectResponse
    {
        $visit = Auth::user()->visits()->with('record')->find($visit_id);

        $visit->record->delete();

        return redirect()->route('visits.list');
    }
}
