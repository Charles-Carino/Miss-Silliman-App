<?php

namespace App\Http\Controllers;
use App\Judges;
use App\Organizers;
use App\Candidates;
use Illuminate\Http\Request;

class OrganizersController extends Controller
{
    public function show(){
        $judges = Judges::all();
        $organizers = Organizers::all();
        $candidates = Candidates::all();

        return view('maintenance.maintenance',compact('judges','organizers','candidates'));
    }
}
