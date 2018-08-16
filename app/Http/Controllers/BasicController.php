<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class BasicController extends Controller
{
    public function __construct(){
      $this->middleware('guest',['except' => 'destroy','except' => 'check']);
    }
    public function check(){
        if(Auth::check()){
            if(Auth::user()->userType=="organizer")
              return redirect('/maintenance');
            else
              return redirect('/welcome');
        }
        else
            return redirect('/login');
    }

    public function signIn(){
      if(!auth()->attempt(request(['username','password']))){
        return back()->withErrors([
          'message' => 'Please check your credintials and try again.'
        ]);
      }

      return redirect('/');
    }
}
