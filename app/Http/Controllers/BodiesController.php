<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Body;
use App\Manufacturer;
use App\Series;

class BodiesController extends Controller
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
        $bodies = Body::all();
        $bodies = Body::orderBy('created_at', 'desc')->paginate(5);
        return view('manage.body_type.index')->with('bodies', $bodies);
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

        $bodies = new Body;
        $bodies->name = $request->name;
        $bodies->save();

        return redirect('body')->with('success', 'Successfully Added');
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
        $body = Body::find($id);
        $bodies = Body::orderBy('created_at', 'desc')->paginate(5);
        return view('manage.body_type.edit')->with('body', $body)->with('bodies', $bodies);
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
                $bodies = Body::find($id)->update([
                    'name' => $request->name
                ]);
                
                return redirect('body')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bodies = Body::find($id);
        $bodies->delete();

        return redirect('body')->with('error', 'Deleted');
    }
}
