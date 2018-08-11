<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\Prepageants;
class JudgesController extends Controller
{
    public function show(){
      $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->get();
      return view('welcome',compact('candidates'));
    }

    public function addScores(Request $request){
      // dd($request['talent_1']);
      // for($i = 1; $i <= 10; $i++){
      //   $check = Prepageants::where('candidate','=',$i);

        Prepageants::create([
            'candidate' => $i,
            'judge' => $request['judge'],
            'Talent_RS' => $request['talent_'.$i],
            'Talent_Prcnt' => '0.40'
        ]);
      // }

      return redirect('/welcome');
    }
}
