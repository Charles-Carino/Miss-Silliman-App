<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepageants extends Model
{
  protected $fillable = [
      'candidate', 'judge',
      'SP_RS', 'Talent_RS','PSPch_RS',
      'SP_Prcnt','Talent_Prcnt','PSpch_Prcnt'
  ];
}
