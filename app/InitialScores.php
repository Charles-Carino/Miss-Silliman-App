<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitialScores extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'candidate','judge',
        'IS_Production_RS',     'IS_ThemeWr_RS',    'IS_EveGown_RS',    'IS_SeqIntrvw_RS',      'IS_InitIntrvw_RS',
        'IS_Production_Prcnt',  'IS_ThemeWr_Prcnt', 'IS_EveGown_Prcnt', 'IS_SeqIntrvw_Prcnt',   'IS_InitIntrvw_Prcnt',
        'IS_Subtotal',
        'SQ_Content_RS',        'SQ_Confidence_RS',     'SQ_Wit_RS',
        'SQ_Content_Prcnt',     'SQ_Confidence_Prcnt',  'SQ_Wit_Prcnt',
        'SQ_Subtotal',
    ];
}
