<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Report;
use App\Owner;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $owner = Owner::find($id);
        // $vehicles = Vehicle::where('owner_id', $owner->id)->get();
        // // $vehicles = Vehicle::where('owner_id', $owner->id)->get();
        // $owners = Owner::select('lastname', $id)->get();
        $reports = Report::all();
        $reports = Report::orderBy('created_at', 'desc')->paginate(10);
        // return view('report.index')->with('reports', $reports)->with('owners', $owners);
        return view('report.index')->with('reports', $reports);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        $vehicle_plate_no = $report->plate_no;
        $vehicle = Vehicle::where('plate_no', $vehicle_plate_no)->get();
        $vehicle_reports = $vehicle[0];
        // $owner_plate_no = $report->owner;
        // $owner = Owner::where('id', $owner_plate_no)->get();
        // $owner_reports = $owner[0];
        // return $vehicle_reports;


        return view('report.show')->with('vehicle_reports', $vehicle_reports)->with('status', $report->status)->with('report', $report);

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
