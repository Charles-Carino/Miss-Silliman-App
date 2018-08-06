<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidates;
class JudgesController extends Controller
{
    public function show(){
      $candidates = Candidates::join('colleges','colleges.id','=','candidates.c_college')->get();

      return view('welcome',compact('candidates'));
    }
}
