<?php

namespace App\Http\Controllers;
use App\User;
use App\Organizers;
use App\Candidates;
use App\Colleges;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{
    public function show(){
        $judges = User::where('userType', '=', 'judge')->get();
        $organizers = User::where('userType', '=', 'organizer')->get();
        $candidates = Candidates::join('Colleges','Candidates.college','=','Colleges.id','left')->get();
        $colleges = Colleges::all();

        return view('maintenance.maintenance',compact('judges','organizers','candidates', 'colleges'));
    }
}
