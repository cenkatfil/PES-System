<?php

namespace App\Http\Controllers;
use App\Vehicle;
use App\Manufacturer;
use App\Series;
use App\Body;
use App\Owner;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $owners = Owner::all();
        return view('manage.vehicle.index')->with('vehicles', $vehicles)->with('owners', $owners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manus = Manufacturer::all();
        $series = Series::all();
        $body_types = Body::all();
        return view('manage.vehicle.create')->with('manus', $manus)->with('series', $series)->with('body_types', $body_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'plate_no' => 'required|min:1',
        //     'displacement' => 'required|min:1',
        //     'cylinders' => 'required|min:1',
        //     'fuel' => 'required|min:1',
        //     'or_no' => 'required|min:1',
        //     'cr_no' => 'required|min:1'
        // ]);

        // return $request;
        $vehicle = new Vehicle;
        $vehicle->owner_id = $request->owner_id;
        $vehicle->plate_no = $request->plate_no;
        $vehicle->displacement = $request->displacement;
        $vehicle->cylinders = $request->cylinders;
        $vehicle->fuel = $request->fuel;
        $vehicle->or_no = $request->or_no;
        $vehicle->cr_no = $request->cr_no;
        $vehicle->body_type = $request->body_type;
        $vehicle->manufacturer = $request->manufacturer;
        $vehicle->series = $request->series;
        $vehicle->save();

        return redirect('vehicle/' .$vehicle->owner_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::find($id);
        $vehicles = Vehicle::where('owner_id', $owner->id)->get();
        // return $vehicles;
        $manus = Manufacturer::all();
        $series = Series::all();
        $body_types = Body::all();
        return view('manage.vehicle.show')->with('vehicles', $vehicles)->with('manus', $manus)->with('series', $series)->with('body_types', $body_types)->with('owner', $owner);
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
        //
    }
}
