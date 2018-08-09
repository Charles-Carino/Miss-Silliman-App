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

    return redirect('maintenance');
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

    return redirect('maintenance');
  }
}
