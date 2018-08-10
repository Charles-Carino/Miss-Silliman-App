<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colleges;

class CollegesController extends Controller
{
  public function createCollege(Request $request){
      $data = array(
          'table'=> strip_tags(trim($request['page'])),
          'values'=> $request['values']
      );
      die();

      if($data['table'] == 'colleges'){
          Colleges::create([
              'collegeCode' => $data['collegeCode'],
              'collegeName' => $data['collegeName']
          ]);
      }
  }
}
