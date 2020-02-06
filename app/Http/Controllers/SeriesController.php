<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Series;

class SeriesController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */ 
   public function __construct()
   {
       $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::all();
        $series = Series::orderBy('created_at', 'desc')->paginate(5);
        return view('manage.series.index')->with('series', $series);
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
        $request->validate([
            'name' => 'required|min:1'
        ]);
        
        $series = new Series;
        $series->manu_id = $request->manu_id;
        $series->name = $request->name;
        $series->save();

        return redirect('series/' .$request->manu_id)->with('success', 'Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manu = Manufacturer::find($id);
        $series = Series::where('manu_id', $id)->get();
        // return $series;
        return view('manage.series.show')->with('series', $series)->with('manu', $manu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manu = Manufacturer::find($id);
        $series = Series::where('manu_id', $id)->get();
        // $series = Series::orderBy('created_at', 'desc')->paginate(5);
        return view('manage.series.edit')->with('series', $series)->with('manu', $manu);
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
        $manu = Manufacturer::find($id);
        // $series = Series::where('manu_id', $id)->get();
        $series = Series::where('manu_id', $id)->get()->update([
            'name' => $request->name
        ]);
        
        return redirect('series')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $series = Series::find($id);
        $series->delete();

        return redirect('series')->with('error', 'Deleted');

    }
}
