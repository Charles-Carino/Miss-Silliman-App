<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judges extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'J_FName','J_LName','J_Event','username','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
