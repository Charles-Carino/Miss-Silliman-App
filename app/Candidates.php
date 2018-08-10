<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
  public $timestamps = false;
  protected $fillable = [
      'image', 'fName', 'mName', 'lName',' college', 'SY', 'isTop',
      'number', 'seqTalent', 'seqSpeech', 'aveTalent'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
    ];
}
