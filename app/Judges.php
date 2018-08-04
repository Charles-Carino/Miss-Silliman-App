<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judges extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'J_FName','J_MName','J_LName','J_Event'
    ];
}
