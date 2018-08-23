<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\InitialScores;

class InitialScoresController extends Controller
{
    public function finalize(Request $request){
      for($i = 0; $i < count($request['key']);$i++){
        Candidates::where('id',$request['key'][$i])->update([
            'isTop' => $request['values'][$i]
        ]);
      }
    }
}
