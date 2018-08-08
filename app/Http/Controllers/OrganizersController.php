<?php

namespace App\Http\Controllers;
use App\User;
use App\Organizers;
use App\Candidates;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{
    public function show(){
        $judges = User::where('userType', '=', 'judge')->get();
        $organizers = Organizers::all();
        $candidates = Candidates::all();

        return view('maintenance.maintenance',compact('judges','organizers','candidates'));
    }
}
