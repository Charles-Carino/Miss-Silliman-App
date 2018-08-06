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
        //Auth::<Organizer/Judge> -> <type> == 'admin'
        if(Auth::user()->U_UserType == 'organizer'){
            return redirect('/maintenance');
        }
        else{
 
            $candidates = Candidates::all();

            return view('welcome',compact('candidates'));
        }
    }
}
