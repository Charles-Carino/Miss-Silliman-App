<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\CollegeAnsKey;
use App\Degree;
use App\Question;
use App\ResultTable;
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
        // ooor isAdmin == true ?
        if(Auth::user()->userType == 'admin'){
            return redirect('/maintenance');
        }
        // if is a judge
        else{
            //to change to MissSilliman version
            //kept original code as basis

            //-----------------------------------------------------------------------------
            // MissSilliman version:
            // kinda an sql statement?
            // $c = Candidates::get();
            $c = College::where('id','<=',4)->get();
            //-----------------------------------------------------------------------------

            //getting info about colleges? (first four)
            // MissSilliman version:
            // for loop to get values from db?
            // probably get trappings in case for next year Miss Silliman? (Future Implementations) 
            
            // foreach($c as $cand):
            //     $cand->C_FName = $this->getFName($cand->C_FName);
            //     $cand->C_LName = $this->getLName($cand->C_LName);
            //     $cand->C_College = $this->getCollege($cand->College);
            // endforeach;
            
            foreach($c as $col):
                $col->collegeAboutInfo = $this->getWords($col->collegeAboutInfo);
            endforeach;

            //idk what compact does
            //this is probably c from line 47?
            return view('welcome',compact('c'));
        }
    }

    //idk what this does
    public function getWords($aboutInfo,$count = 20){
      preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $aboutInfo, $matches);
      return $matches[0];
    }
}
