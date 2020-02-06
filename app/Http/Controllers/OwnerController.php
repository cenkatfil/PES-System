<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
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
        $owners = Owner::orderBy('created_at', 'desc')->paginate(5);
        return view('manage.owner.index')->with('owners', $owners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.owner.create');
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
            'lastname' => 'required|min:1',
            'firstname' => 'required|min:1',
            'address' => 'required|min:1',
            'contact_no' => 'required|min:1',
            'license_no' => 'required|min:1'
        ]);

        $own = new Owner;
        $own->lastname = $request->lastname;
        $own->firstname = $request->firstname;
        $own->address = $request->address;
        $own->contact_no = $request->contact_no;
        $own->license_no = $request->license_no;
        $own->save();

        return redirect('owner')->with('success', 'Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $own = Owner::find($id);
        $owners = Owner::orderBy('created_at', 'desc')->paginate(5);
        // return $manu;
        return view('manage.owner.edit')->with('owners', $owners)->with('own', $own);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $own = Owner::find($id)->update([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'license_no' => $request->license_no
        ]);
        
        return redirect('owner')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $own = Owner::find($id);
        $own->delete();

        return redirect('owner')->with('error', 'Deleted');
    }
}
