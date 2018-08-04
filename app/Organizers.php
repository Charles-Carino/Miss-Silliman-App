<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizers extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'O_FName','O_MName','O_LName','O_Position','O_isAdmin','O_isJudge'
    ];
}
