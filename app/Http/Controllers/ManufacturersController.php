<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Series;

class ManufacturersController extends Controller
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
        $manufacturers = Manufacturer::orderBy('created_at', 'desc')->paginate(5);

        // return $manufacturers;
        return view('manage.manufacturer.index')->with('manufacturers', $manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.manufacturer.create');
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

        $manu = new Manufacturer;
        $manu->name = $request->name;
        $manu->save();

        return redirect('manufacturer')->with('success', 'Successfully Added');
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
        $manu = Manufacturer::find($id);
        $manufacturers = Manufacturer::orderBy('created_at', 'desc')->paginate(5);
        // return $manu;
        return view('manage.manufacturer.edit')->with('manufacturers', $manufacturers)->with('manu', $manu);
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
        // return $request;
        $manu = Manufacturer::find($id)->update([
            'name' => $request->name
        ]);
        
        return redirect('manufacturer')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manu = Manufacturer::find($id);
        $manu->delete();

        return redirect('manufacturer')->with('error', 'Deleted');
    }
}
