<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function createUser(Request $request){
      $data = array(
          'table'=> strip_tags(trim($request['page'])),
          'values'=> $request['values'],
          'avatar' => $request['avatar']
      );
      die();
      if($data['table'] == 'users'){
          User::create([
              'fName' => $data['fName'],
              'mName' => $data['mName'],
              'lName' => $data['lName'],
              'userType' => $data['userType'],
              'position' => $data['position'],
              'event' => $data['event'],
              'roles' => $data['roles'],
              'username' => $data['username'],
              'password' => $data['password']
          ]);
      }
  }
}
