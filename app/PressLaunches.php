<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressLaunches extends Model
{
  protected $fillable = [
      'candidate', 'organizer'
  ];
}
