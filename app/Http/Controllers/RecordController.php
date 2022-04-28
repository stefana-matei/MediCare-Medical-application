<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // create
    public function create(Request $request)
    {
        return Record::create($request->all());
    }

    // get
    public function get($id)
    {
        return Record::find($id);
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
    public function delete($id)
    {
        Record::find($id)->delete();
    }
}
