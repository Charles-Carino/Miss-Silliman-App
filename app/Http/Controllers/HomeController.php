<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\User;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->userType == 'organizer'){
            $judges = Judges::all();
            $organizers = Organizers::all();
            $candidates = Candidates::all();

            return view('maintenance.maintenance',compact('judges','organizers','candidates'));
        }
        else{
            $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->get();
            return view('welcome',compact('candidates'));
        }
    }
}
