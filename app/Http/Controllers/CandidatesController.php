<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
use App\Colleges;

class CandidatesController extends Controller
{
  public function createCandidate(Request $request){
    Candidates::create([
        'image' => $request['image'],
        'fName' => $request['fName'],
        'mName' => $request['mName'],
        'lName' => $request['lName'],
        'college' => $request['college'],
        'SY' => $request['SY'],
        'isTop' => $request['isTop'],
        'number' => $request['number'],
        'seqTalent' => $request['seqTalent'],
        'seqSpeech' => $request['seqSpeech'],
        'aveTalent' => $request['aveTalent']
      ]);
      return redirect('maintenance');
  }

}
