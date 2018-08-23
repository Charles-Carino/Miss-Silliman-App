<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Candidates;
use App\Prepageants;
use App\User;
use App\PressLaunches;
use App\InitialScores;
class JudgesController extends Controller
{
    public function show(){
      $check = Prepageants::where('judge',Auth::user()->id);
      $user = User::where('id',Auth::user()->id)->first();
      if(!$check && !$user){
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->get();
          return view('welcome',compact('candidates'));
      }
      else if($user->userType == "organizer"){
          $id = Auth::user()->id;
          $press = Candidates::join('colleges','colleges.id','=','candidates.college')->join('press_launches','press_launches.candidate','=','candidates.id')->join('prepageants','prepageants.candidate','=','candidates.id')->where('organizer',Auth::user()->id)->where('prepageants.judge',Auth::user()->id)->get();
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('prepageants','prepageants.candidate','=','candidates.id')->where('judge',Auth::user()->id)->get();
          $finals = Candidates::join('initial_scores','initial_scores.candidate','=','candidates.id')->where('initial_scores.judge',1)->get();
          return view('welcome',compact('press','candidates','finals'));
      }
      else if($user->userType == "judge"){
        if($user->event == "Talent")
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('prepageants','prepageants.candidate','=','candidates.id')->where('judge',Auth::user()->id)->orderBy("seqTalent")->get();
        else if($user->event == "Speech")
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('prepageants','prepageants.candidate','=','candidates.id')->where('judge',Auth::user()->id)->orderBy("seqSpeech")->get();
        else if($user->event == "Final")
          $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('initial_scores','initial_scores.candidate','=','candidates.id')->where('judge',Auth::user()->id)->get();
        else
          $candidates = $candidates = Candidates::join('colleges','colleges.id','=','candidates.college')->join('initial_scores','initial_scores.candidate','=','candidates.id')->where('judge',Auth::user()->id)->get();

        return view('welcome',compact('candidates'));
      }
    }

    public function addScores(Request $request){
      $check = Prepageants::where('judge',$request['judge'])->get();
      $final = InitialScores::where('judge',$request['judge'])->get();
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
                'read' => 'readonly'
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
                'read' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Special Projects"){
          // dd(count($request));
          foreach($check as $key){
            $i = $key->candidate;
            Prepageants::where('id',$key->id)->update([
                'candidate' => $i,
                'judge' => $request['judge'],
                'SP_RS' => $request['score_'.$key->id],
                'read' => 'readonly'
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
                'readPL' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Production"){
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
                'IS_Production_Confidence' => $request['prod_confidence_'.$key->id],
                'IS_Production_Mastery' => $request['prod_mastery_'.$key->id],
                'IS_Production_StagePresence' => $request['prod_stage_'.$key->id],
                'IS_Production_OverallImpact' => $request['prod_impact_'.$key->id],
                'readPROD' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Theme Wear"){
          // dd($request);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
                'IS_ThemeWr_Grace' => $request['theme_grace_'.$key->id],
                'IS_ThemeWr_Projection' => $request['theme_projection_'.$key->id],
                'IS_ThemeWr_Poise' => $request['theme_poise_'.$key->id],
                'IS_ThemeWr_Relevance' => $request['theme_relevance_'.$key->id],
                'readTHEME' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Evening Gown"){
          // dd($request);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
                'IS_EveGown_Grace' => $request['evening_grace_'.$key->id],
                'IS_EveGown_Projection' => $request['evening_projection_'.$key->id],
                'IS_EveGown_Poise' => $request['evening_poise_'.$key->id],
                'IS_EveGown_Regal' => $request['evening_regal_'.$key->id],
                'readEVE' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Standard Question"){
          // dd($request);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
                'SQ_Content' => $request['sq_content_'.$key->id],
                'SQ_Confidence' => $request['sq_confidence_'.$key->id],
                'SQ_Wit' => $request['sq_wit_'.$key->id],
                'readSQ' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Sequential Interview"){
          // dd($request);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
                'IS_SeqIntrvw_Content' => $request['seq_content'.$key->id],
                'IS_SeqIntrvw_Wit' => $request['seq_wit'.$key->id],
                'IS_SeqIntrvw_Delivery' => $request['seq_delivery'.$key->id],
                'IS_SeqIntrvw_Confidence' => $request['seq_confidence'.$key->id],
                'readSEQ' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Initial Interview"){
          // dd($request);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
              'IS_InitIntrvw_Content' => $request['init_content_'.$key->id],
              'IS_InitIntrvw_Wit' => $request['init_wit_'.$key->id],
              'IS_InitIntrvw_Delivery' => $request['init_delivery_'.$key->id],
              'IS_InitIntrvw_Confidence' => $request['init_confidence_'.$key->id],
              'readINIT' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Prep Deductions"){
          // dd($request);
          foreach($check as $key){
            Prepageants::where('id',$key->id)->update([
              'deductions' => $request['preDeduct_'.$key->id],
              'readDeduc' => 'readonly'
            ]);
          }
        }else if($request['event'] == "Final Deductions"){
          // dd($final);
          foreach($final as $key){
            InitialScores::where('id',$key->id)->update([
              'deductions' => $request['finDeduct_'.$key->id],
              'readDEDUC' => 'readonly'
            ]);
          }
        }
      return redirect('/welcome');
    }
}
