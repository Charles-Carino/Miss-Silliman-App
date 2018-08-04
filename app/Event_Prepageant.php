<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Prepageant extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'Candidate','SP_RS','Talent_RS','PSpch_RS','SP_Prcnt','Talent_Prcnt','PSpch_Prcnt','Sub_Total','Judge'
    ];
}
