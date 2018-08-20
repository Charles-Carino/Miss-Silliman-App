<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepageants extends Model
{
  protected $fillable = [
      'candidate', 'judge',
  ];
}
