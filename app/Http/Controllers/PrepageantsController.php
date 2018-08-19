<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prepageants;
use App\PressLaunches;
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
            Prepageants::where('id',$request['row'])->update([
                'judge' => $request['judge'],
                'SP_RS' => $request['values'][0],
            ]);
        }else if($request['event'] == "Press Launch"){
          PressLaunches::where('id',$request['row'])->update([
              'PL_RS' => $request['values'][0],
          ]);
        }
    }
}
