<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Owner;
use App\User;
class DashboardsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = Report::all();
        $owners = Owner::all();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // return $user->name;

        return view('dashboard')->with('reports', $reports)->with('user', $user);
    }
}
