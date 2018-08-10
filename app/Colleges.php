<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colleges extends Model
{
  public $timestamps = false;
  protected $fillable = [
      'collegeCode', 'collegeName'
  ];
}
