<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VehicleType;

class VehicleTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:vehicle_type', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_types = VehicleType::latest()->get();
        return view('backend.pages.ticket-management.attributes.vehicle-type', compact('vehicle_types'));
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
            'name' => 'required|unique:vehicle_types,name',
        ]);
        $vehicle_type = New VehicleType();
        $vehicle_type->name = $request->name;
        if($vehicle_type->save()){
            return redirect()->back()->with('vehicle-type-create-success', 'A vehicle type has been created successfully');
        }
        else{
            return redirect()->back()->with('vehicle-type-create-failed', 'Something went wrong');
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
        $vehicle_type = VehicleType::findOrFail($id);
        if($vehicle_type->delete()){
            return redirect()->back()->with('vehicle-type-delete-success', 'A vehicle type has been deleted successfully');
        }
        else{
            return redirect()->back()->with('vehicle-type-delete-failed', 'Something went wrong');
        }
    }
}
