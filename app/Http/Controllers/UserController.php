<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function addJudge(Request $request){
    User::create([
        'fName' => $request['fName'],
        'mName' => $request['mName'],
        'lName' => $request['lName'],
        'userType' => 'judge',
        'event' => $request['event'],
        'username' => $request['username'],
        'password' => bcrypt($request['password'])
    ]);

    return redirect('/maintenance');
  }
  public function addOrganizer(Request $request){
    User::create([
        'fName' => $request['fName'],
        'mName' => $request['mName'],
        'lName' => $request['lName'],
        'userType' => 'organizer',
        'position' => $request['position'],
        'roles' => $request['roles'],
        'event' => $request['event'],
        'username' => $request['username'],
        'password' => bcrypt($request['password'])
    ]);

    return redirect('/maintenance');
  }
}
