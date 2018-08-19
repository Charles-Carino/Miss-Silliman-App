<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prepageants;
use App\PressLaunches;
use App\InitialScores;

class UserController extends Controller
{
  public function addJudge(Request $request){
    if($request['editMode'] == 'edit'){
      User::where('username',$request['username'])->update([
        'fName' => $request['fName'],
        'mName' => $request['mName'],
        'lName' => $request['lName'],
        'event' => $request['event'],
        'username' => $request['username'],
        'password' => bcrypt($request['password'])
      ]);
    }else{
      dump($request);
      User::create([
          'fName' => $request['fName'],
          'mName' => $request['mName'],
          'lName' => $request['lName'],
          'userType' => 'judge',
          'event' => $request['event'],
          'username' => $request['username'],
          'password' => bcrypt($request['password'])
      ]);
      if($request['event'] == "Final"){
        $id = User::where('username',$request['username'])->first();
        for($i = 1; $i <= 10;$i++){
          InitialScores::create([
            'candidate' => $i,
            'judge' => $id->id
          ]);
        }
      }else{
        $id = User::where('username',$request['username'])->first();
        for($i = 1; $i <= 10;$i++){
          Prepageants::create([
            'candidate' => $i,
            'judge' => $id->id
          ]);
        }
      }
    }

    return redirect('/maintenance');
  }

  public function addOrganizer(Request $request){
    $rolesString = "";
    if(isset($request['roles']))
    {
        $roles = $request['roles'];

        $rolesString = implode(',', $roles);
    }
    User::create([
        'fName' => $request['fName'],
        'mName' => $request['mName'],
        'lName' => $request['lName'],
        'userType' => 'organizer',
        'position' => $request['position'],
        'roles' => $rolesString,
        'event' => $request['event'],
        'username' => $request['username'],
        'password' => bcrypt($request['password'])
    ]);

    $id = User::where('username',$request['username'])->first();
    for($i = 1; $i <= 10;$i++){
      PressLaunches::create([
        'candidate' => $i,
        'organizer' => $id->id
      ]);
      if(in_array("judge",explode(",",$id->roles))){
        Prepageants::create([
          'candidate' => $i,
          'judge' => $id->id
        ]);
      }
    }
    return redirect('/maintenance');
  }
}
