<?php

namespace App\Http\Controllers\Patient;

use App\Models\Record;
use App\Models\Visit;
use App\Services\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mpdf\Mpdf;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $visit = Auth::user()->visits()->with('record')->findOrFail($id);
        $record = $visit->record;

        if(is_null($record)){
            return abort(404);
        }

        return view('authenticated.patient.records.get', [
            'visit' => $visit,
            'record' => $record
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


    public function uploadFile($id, Request $request)
    {
        /** @var Visit $visit */
        $visit = Auth::user()->visits()->with('record')->find($id);

        /** @var Record $record */
        $record = $visit->record;

        if(is_null($record)){
            return abort(404);
        }

        // validate request
        $request->validate([
            'file' => 'required|file|max:8192'
        ]);

        $record->addMediaFromRequest('file')->toMediaCollection('files');


        return back()->withSuccess('Fisierul a fost incarcat cu succes!');
    }


    /**
     * @param $id
     * @param Request $request
     */
    public function print($id, Request $request)
    {
        $visit = Auth::user()->visits()->with('record', 'membership.patient.settingsPatient', 'membership.medic')->findOrFail($id);
        $record = $visit->record;
        $patient = $visit->membership->patient;

        if(is_null($record)){
            return abort(404);
        }

        $view = view('authenticated.patient.records.print', [
            'visit' => $visit,
            'record' => $record,
            'patient' => $patient,
            'medic' => $visit->membership->medic
        ]);

        $pdf = new Mpdf();
        $pdf->WriteHTML($view->render());
        $prefix = $patient->firstname . '_' . $patient->lastname . '_';
        $pdf->Output($prefix . 'raport_medical.pdf', 'I');

    }
}
