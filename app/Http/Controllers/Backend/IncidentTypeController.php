<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IncidentType;

class IncidentTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:incident_type', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incident_types = IncidentType::latest()->get();
        return view('backend.pages.ticket-management.attributes.incident-type', compact('incident_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:incident_types,name',
        ]);
        $incident_type = New IncidentType();
        $incident_type->name = $request->name;
        if($incident_type->save()){
            return redirect()->back()->with('incident-type-create-success', 'An incident type has been created successfully');
        }
        else{
            return redirect()->back()->with('incident-type-create-failed', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident_type = IncidentType::findOrFail($id);
        if($incident_type->delete()){
            return redirect()->back()->with('incident-type-delete-success', 'An incident type has been deleted successfully');
        }
        else{
            return redirect()->back()->with('incident-type-delete-failed', 'Something went wrong');
        }
    }
}
