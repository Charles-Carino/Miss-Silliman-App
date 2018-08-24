<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\InitialScores;

class InitialScoresController extends Controller
{
    public function finalize(Request $request){
      // dd($request);
      $cleanedArray = [];
      $cleanedKeys = [];
      for($i = 0; $i < count($request['key']);$i++){
        if(!is_null($request['values'][$i])){
          $cleanedArray[$request['key'][$i]] = $request['values'][$i];
        }
      }
      $cleanedKeys = array_keys($cleanedArray);
      foreach($cleanedKeys as $key){
        Candidates::where('id',$key)->update([
            'isTop' => $cleanedArray[$key]
        ]);
      }
    }
}
