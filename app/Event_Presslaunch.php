<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Presslaunch extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'PL_RS','Candidate','Judge'
    ];
}
