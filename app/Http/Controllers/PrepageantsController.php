<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prepageants;
use App\PressLaunches;
use App\InitialScores;
class PrepageantsController extends Controller
{
    public function save(Request $request){
        if($request['event'] == "Talent"){
          Prepageants::where('id',$request['row'])->update([
              'Talent_Confidence' => $request['values'][0],
              'Talent_Mastery' => $request['values'][1],
              'Talent_StagePresence' => $request['values'][2],
              'Talent_OverallImpact' => $request['values'][3],
          ]);
        }else if($request['event'] == "Speech"){
          Prepageants::where('id',$request['row'])->update([
            'PSpch_Content' => $request['values'][1],
            'PSpch_Delivery' => $request['values'][2],
            'PSpch_Spontainety' => $request['values'][3],
            'PSpch_Defense' => $request['values'][4],
          ]);
        }else if($request['event'] == "Special Projects"){
            // dd($request);
            Prepageants::where('id',$request['row'])->update([
                'SP_RS' => $request['values'][0],
            ]);
        }else if($request['event'] == "Press Launch"){
          PressLaunches::where('id',$request['row'])->update([
              'PL_RS' => $request['values'][0],
          ]);
        }else if($request['event'] == "Production"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
              'IS_Production_Confidence' => $request['values'][0],
              'IS_Production_Mastery' => $request['values'][1],
              'IS_Production_StagePresence' => $request['values'][2],
              'IS_Production_OverallImpact' => $request['values'][3],
          ]);
        }else if($request['event'] == "Theme Wear"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
              'IS_ThemeWr_Grace' => $request['values'][0],
              'IS_ThemeWr_Projection' => $request['values'][1],
              'IS_ThemeWr_Poise' => $request['values'][2],
              'IS_ThemeWr_Relevance' => $request['values'][3],
          ]);
        }else if($request['event'] == "Evening Gown"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
              'IS_EveGown_Grace' => $request['values'][0],
              'IS_EveGown_Projection' => $request['values'][1],
              'IS_EveGown_Poise' => $request['values'][2],
              'IS_EveGown_Regal' => $request['values'][3],
          ]);
        }else if($request['event'] == "Standard Question"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
              'SQ_Content' => $request['values'][0],
              'SQ_Confidence' => $request['values'][1],
              'SQ_Wit' => $request['values'][2],
          ]);
        }else if($request['event'] == "Sequential Interview"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
              'IS_SeqIntrvw_Content' => $request['values'][0],
              'IS_SeqIntrvw_Wit' => $request['values'][1],
              'IS_SeqIntrvw_Delivery' => $request['values'][2],
              'IS_SeqIntrvw_Confidence' => $request['values'][3],
          ]);
        }else if($request['event'] == "Initial Interview"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
            'IS_InitIntrvw_Content' => $request['values'][0],
            'IS_InitIntrvw_Wit' => $request['values'][1],
            'IS_InitIntrvw_Delivery' => $request['values'][2],
            'IS_InitIntrvw_Confidence' => $request['values'][3],
          ]);
        }else if($request['event'] == "Prep Deductions"){
          // dd($request);
          Prepageants::where('id',$request['row'])->update([
            'deductions' => $request['values'][0],
          ]);
        }else if($request['event'] == "Final Deductions"){
          // dd($request);
          InitialScores::where('id',$request['row'])->update([
            'deductions' => $request['values'][0],
          ]);
        }
    }
}
