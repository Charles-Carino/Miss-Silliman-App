<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'C_FName','C_MName','C_Lname','C_College', 'C_YearLevel', 'S_SY', 'C_isTop', 'C_Number', 'C_SeqTalent', 'C_SeqSpeech', 'C_AveTalent'
    ];
}
