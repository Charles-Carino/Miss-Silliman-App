<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Candidates;
use App\Prepageants;
use App\User;
use App\PressLaunches;
class JudgesController extends Controller
{
    public function show(){
      $check = Prepageants::where('judge',Auth::user()->id)->first();
      $org = User::where('id',Auth::user()->id)->first();
      if(!$check && !$org){
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->get();
      }
      else if($org){
          $PL = Candidates::join('colleges','colleges.id','=','candidates.college')->join('press_launches','press_launches.candidate','=','candidates.id')->where('organizer',Auth::user()->id)->get();
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('prepageants','prepageants.candidate','=','candidates.id')->where('judge',Auth::user()->id)->get();
          return view('welcome',compact('PL','candidates'));
      }

      else
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('prepageants','prepageants.candidate','=','candidates.id')->where('judge',Auth::user()->id)->get();
      return view('welcome',compact('candidates'));
    }

    public function addScores(Request $request){
      $check = Prepageants::where('judge',$request['judge'])->get();
        if($request['event'] == "Talent"){
          foreach($check as $key){
            $i = $key->candidate;
            Prepageants::where('id',$key->id)->update([
                'candidate' => $i,
                'judge' => $request['judge'],
                'Talent_Confidence' => $request['confidence_'.$key->id],
                'Talent_Mastery' => $request['mastery_'.$key->id],
                'Talent_StagePresence' => $request['stage_'.$key->id],
                'Talent_OverallImpact' => $request['impact_'.$key->id],
            ]);
          }
        }else if($request['event'] == "Speech"){
          foreach($check as $key){
            $i = $key->candidate;
            Prepageants::where('id',$key->id)->update([
                'candidate' => $i,
                'judge' => $request['judge'],
                'PSpch_Content' => $request['content_'.$key->id],
                'PSpch_Delivery' => $request['delivery_'.$key->id],
                'PSpch_Spontainety' => $request['spon_'.$key->id],
                'PSpch_Defense' => $request['defense_'.$key->id],
            ]);
          }
        }else if($request['event'] == "Special Projects"){
          foreach($check as $key){
            $i = $key->candidate;
            Prepageants::where('id',$key->id)->update([
                'candidate' => $i,
                'judge' => $request['judge'],
                'SP_RS' => $request['input_'.$key->id],
            ]);
          }
        }else if($request['event'] == "Press Launch"){
          $press = PressLaunches::where('organizer',$request['judge'])->get();
          foreach($press as $key){
            $i = $key->candidate;
            PressLaunches::where('id',$key->id)->update([
                'candidate' => $i,
                'organizer' => $request['judge'],
                'PL_RS' => $request['press_'.$key->id],
            ]);
          }
        }
      return redirect('/welcome');
    }
}
