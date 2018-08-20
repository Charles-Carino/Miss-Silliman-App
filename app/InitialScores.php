<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitialScores extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'candidate', 'judge',
    ];
}
