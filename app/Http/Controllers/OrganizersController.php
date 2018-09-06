<?php

namespace App\Http\Controllers;
use App\User;
use App\Organizers;
use App\Candidates;
use App\Colleges;
use App\Prepageants;
use App\InitialScores;
use App\PressLaunches;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class OrganizersController extends Controller
{
    public function show(){
        $judges = User::where('userType', '=', 'judge')->get();
        $organizers = User::where('userType', '=', 'organizer')->get();
        $candidates = Candidates::join('colleges','candidates.college','=','colleges.id','left')->get();
        $colleges = Colleges::all();
        $prepageants = Prepageants::join('candidates','prepageants.candidate','=','candidates.id','left')
									->join('colleges','candidates.college','=','colleges.id','left')
									->get();
        $initScores = InitialScores::join('candidates','initial_scores.candidate','=','candidates.id','left')
                                    ->join('colleges','candidates.college','=','colleges.id','left')
                                    ->get();
        $pressLaunchScores = PressLaunches::join('users','users.id','=','press_launches.organizer','left')
									->join('candidates','press_launches.candidate','=','candidates.id','left')
									->join('colleges','candidates.college','=','colleges.id','left')
									->orderby('PL_RS','desc')
									->get();

        $checkTop = Candidates::where('isTop','!=','')->pluck('isTop');

//        dd($checkTop);

        $reports = DB::select(DB::raw(
			"select
          			t0.id,
          			t0.cCode,
                      t0.candidates,
                      t0.SP as 'SP',
                  	t1.talent as 'judge1',
                      t2.talent as 'judge2',
                      t3.talent as 'judge3',
                  	(t1.talent+t2.talent+t3.talent)/3 as AverageTalent,
                  	t4.speech as 'judge4',
                      t5.speech as 'judge5',
                      t6.speech as 'judge6',
                  	(t4.speech+t5.speech+t6.speech)/3 as AverageSpeech,
                  	(t0.SP*.16) as 'SP_sixteen',
                  	((t1.talent+t2.talent+t3.talent)/3)*.34 as 'Talent_34',
                  	((t4.speech+t5.speech+t6.speech)/3)*.50 as 'Speech_50',
                  	(t0.SP*.16)+((t1.talent+t2.talent+t3.talent)/3)*.34+((t4.speech+t5.speech+t6.speech)/3)*.50 as 'TotalPrepageant'

                  from
                  /*special project*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
          				,sum(pre.SP_RS) SP
          				,col.`collegeCode` cCode
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	group by candidates
                  	ORDER BY can.id) t0
                  /*end*/
                  	,
                  /*talent judge1*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,Talent_Confidence
                  		,Talent_Mastery
                  		,Talent_StagePresence
                  		,Talent_OverallImpact
                  		,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 2
                  	group by candidates
                  	ORDER BY can.id) t1
                  /*end*/
                  	,
                  /*talent judge2*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,Talent_Confidence
                  		,Talent_Mastery
                  		,Talent_StagePresence
                  		,Talent_OverallImpact
                  		,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 3
                  	group by candidates
                  	ORDER BY can.id) t2
                  /*end*/
                  	,
                  /*talent judge3*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,Talent_Confidence
                  		,Talent_Mastery
                  		,Talent_StagePresence
                  		,Talent_OverallImpact
                  		,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 4
                  	group by candidates
                  	ORDER BY can.id) t3
                  /*end*/
                  	,
                  /*speech judge4*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,PSpch_Content
                  		,PSpch_Delivery
                  		,PSpch_Spontainety
                  		,PSpch_Defense
                  		,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 5 #replace with judge id ie: 4,5 or 6
                  	group by candidates
                  	ORDER BY can.id) t4
                  /*end*/
                  	,
                  /*speech judge5*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,PSpch_Content
                  		,PSpch_Delivery
                  		,PSpch_Spontainety
                  		,PSpch_Defense
                  		,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 6 #replace with judge id ie: 4,5 or 6
                  	group by candidates
                  	ORDER BY can.id) t5
                  /*end*/
                  	,
                  /*speech judge6*/
                  	(select can.id,concat(upper(can.lName),', ',can.fName) candidates
                  		,pre.judge
                  		,PSpch_Content
                  		,PSpch_Delivery
                  		,PSpch_Spontainety
                  		,PSpch_Defense
                  		,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
                  	from prepageants pre
                  	left join candidates can on can.id=pre.candidate
                  	left join colleges col on col.id=can.college
                  	WHERE pre.judge = 7 #replace with judge id ie: 4,5 or 6
                  	group by candidates
                  	ORDER BY can.id) t6
                  /*end*/

                  where
                  	t0.candidates=t1.candidates and t1.candidates=t2.candidates and
                  	t2.candidates=t3.candidates and t3.candidates=t4.candidates and
                  	t4.candidates=t5.candidates and t5.candidates=t6.candidates"));

$sql = "";
$sql.="select
  t0.id,
  t0.cCode,
  t0.candidates,
  t1.EveGown as 'j1_EveGown',
  t2.EveGown as 'j2_EveGown',
  t3.EveGown as 'j3_EveGown',
  t4.EveGown as 'j4_EveGown',
  t5.EveGown as 'j5_EveGown',
  t6.EveGown as 'j6_EveGown',
  t7.EveGown as 'j7_EveGown',
  ((t1.EveGown + t2.EveGown + t3.EveGown + t4.EveGown + t5.EveGown + t6.EveGown + t7.EveGown)/7) as 'AverageEveGown',
  t1.InitIntrvw as 'j1_InitIntrvw',
  t2.InitIntrvw as 'j2_InitIntrvw',
  t3.InitIntrvw as 'j3_InitIntrvw',
  t4.InitIntrvw as 'j4_InitIntrvw',
  t5.InitIntrvw as 'j5_InitIntrvw',
  t6.InitIntrvw as 'j6_InitIntrvw',
  t7.InitIntrvw as 'j7_InitIntrvw',
  ((t1.InitIntrvw + t2.InitIntrvw + t3.InitIntrvw + t4.InitIntrvw + t5.InitIntrvw + t6.InitIntrvw + t7.InitIntrvw)/7) as 'AverageInitIntrvw',
  t1.Production as 'j1_Production',
  t2.Production as 'j2_Production',
  t3.Production as 'j3_Production',
  t4.Production as 'j4_Production',
  t5.Production as 'j5_Production',
  t6.Production as 'j6_Production',
  t7.Production as 'j7_Production',
  ((t1.Production + t2.Production + t3.Production + t4.Production + t5.Production + t6.Production + t7.Production)/7) as 'AverageProduction',
  t1.SeqIntrvw as 'j1_SeqIntrvw',
  t2.SeqIntrvw as 'j2_SeqIntrvw',
  t3.SeqIntrvw as 'j3_SeqIntrvw',
  t4.SeqIntrvw as 'j4_SeqIntrvw',
  t5.SeqIntrvw as 'j5_SeqIntrvw',
  t6.SeqIntrvw as 'j6_SeqIntrvw',
  t7.SeqIntrvw as 'j7_SeqIntrvw',
  ((t1.SeqIntrvw + t2.SeqIntrvw + t3.SeqIntrvw + t4.SeqIntrvw + t5.SeqIntrvw + t7.SeqIntrvw)/6) as 'AverageSeqIntrvw',
  t1.ThemeWr as 'j1_ThemeWr',
  t2.ThemeWr as 'j2_ThemeWr',
  t3.ThemeWr as 'j3_ThemeWr',
  t4.ThemeWr as 'j4_ThemeWr',
  t5.ThemeWr as 'j5_ThemeWr',
  t6.ThemeWr as 'j6_ThemeWr',
  t7.ThemeWr as 'j7_ThemeWr',
  ((t1.ThemeWr + t2.ThemeWr + t3.ThemeWr + t4.ThemeWr + t5.ThemeWr + t6.ThemeWr + t7.ThemeWr)/7) as 'AverageThemeWr',
  t1.SQ_Confidence as 'j1_SQ_Confidence',
  t2.SQ_Confidence as 'j2_SQ_Confidence',
  t3.SQ_Confidence as 'j3_SQ_Confidence',
  t4.SQ_Confidence as 'j4_SQ_Confidence',
  t5.SQ_Confidence as 'j5_SQ_Confidence',
  t6.SQ_Confidence as 'j6_SQ_Confidence',
  t7.SQ_Confidence as 'j7_SQ_Confidence',
  t1.SQ_Content as 'j1_SQ_Content',
  t2.SQ_Content as 'j2_SQ_Content',
  t3.SQ_Content as 'j3_SQ_Content',
  t4.SQ_Content as 'j4_SQ_Content',
  t5.SQ_Content as 'j5_SQ_Content',
  t6.SQ_Content as 'j6_SQ_Content',
  t7.SQ_Content as 'j7_SQ_Content',
  t1.SQ_Wit as 'j1_SQ_Wit',
  t2.SQ_Wit as 'j2_SQ_Wit',
  t3.SQ_Wit as 'j3_SQ_Wit',
  t4.SQ_Wit as 'j4_SQ_Wit',
  t5.SQ_Wit as 'j5_SQ_Wit',
  t6.SQ_Wit as 'j6_SQ_Wit',
  t7.SQ_Wit as 'j7_SQ_Wit',
  t1.SQ_Total as 'j1_SQ_Total',
  t2.SQ_Total as 'j2_SQ_Total',
  t3.SQ_Total as 'j3_SQ_Total',
  t4.SQ_Total as 'j4_SQ_Total',
  t5.SQ_Total as 'j5_SQ_Total',
  t6.SQ_Total as 'j6_SQ_Total',
  t7.SQ_Total as 'j7_SQ_Total',
  ((t1.SQ_Total + t2.SQ_Total + t3.SQ_Total + t4.SQ_Total + t5.SQ_Total + t6.SQ_Total + t7.SQ_Total)/7) as 'Average_SQ_Total'
  from
    (select can.id,concat(upper(can.lName),', ',can.fName) candidates
      ,init.judge
      ,col.`collegeCode` cCode
    from initial_scores init
    left join candidates can on can.id=init.candidate
    left join colleges col on col.id=can.college
    group by candidates
    ORDER BY can.id) t0
    ,";

$array = range(8,14);
foreach($array as $key => $value){
  $sql.=" (select can.id,concat(upper(can.lName),', ',can.fName) candidates
  ,init.judge
  ,IS_EveGown_Grace
  ,IS_EveGown_Poise
  ,IS_EveGown_Projection
  ,IS_EveGown_Regal
  ,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  ,IS_InitIntrvw_Confidence
  ,IS_InitIntrvw_Content
  ,IS_InitIntrvw_Delivery
  ,IS_InitIntrvw_Wit
  ,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  ,IS_Production_Confidence
  ,IS_Production_Mastery
  ,IS_Production_OverallImpact
  ,IS_Production_StagePresence
  ,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  ,IS_SeqIntrvw_Confidence
  ,IS_SeqIntrvw_Content
  ,IS_SeqIntrvw_Delivery
  ,IS_SeqIntrvw_Wit
  ,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  ,IS_ThemeWr_Grace
  ,IS_ThemeWr_Poise
  ,IS_ThemeWr_Projection
  ,IS_ThemeWr_Relevance
  ,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  ,SQ_Confidence
  ,SQ_Content
  ,SQ_Wit
  ,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
 from initial_scores init
 left join candidates can on can.id=init.candidate
 left join colleges col on col.id=can.college
 WHERE init.judge =";
$sql.=$value;
$sql.=' group by candidates ORDER BY can.id) t';
$sql.= ($value-7);
$sql.=',';
}
$sql=substr($sql,0,-1);
$sql.=' where
  t0.candidates=t1.candidates and t1.candidates=t2.candidates and
  t2.candidates=t3.candidates and t3.candidates=t4.candidates and
  t4.candidates=t5.candidates and t5.candidates=t6.candidates and
  t6.candidates=t7.candidates';
$sql = str_replace("\r\n", '', $sql);
// dd($sql);
$initialScores = DB::select(DB::raw($sql));

$initialScoreSummary = DB::select(DB::raw("
  select
		pressLaunch.id,
		table_pn.cCode,
		pressLaunch.candidates,
		pressLaunch.PL_score as 'pressLaunchScore',
		(( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) prepageantTotal,
		(pressLaunch.PL_score * .1)  pressLaunch_tenpercent,
		(((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) pageantNight_sixtypercent,
		((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3) prepageant_thirtypercent,
		((pressLaunch.PL_score * .1) + (((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) + ((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3)) beforeInitial,
		ded1.deduct deductions,
		(((pressLaunch.PL_score * .1) + (((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) + ((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3)) - ded1.deduct) totalInitial
	from
		(select
			can.id
			,concat(upper(can.lName),', ',can.fName) candidates
			,PL_RS as 'PL_score'
			from press_launches p
			left join candidates can on can.id=p.candidate
			left join colleges col on col.id=can.college
			group by candidates
			ORDER BY can.id
		) pressLaunch
			,
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,init.deductions deduct
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 1
			group by candidates
			ORDER BY can.id) ded1
				,
		(select
				t0.id,
				t0.cCode,
				t0.candidates,
				t1.EveGown as 'j1-EveGown',
				t2.EveGown as 'j2-EveGown',
				t3.EveGown as 'j3-EveGown',
				t4.EveGown as 'j4-EveGown',
				t5.EveGown as 'j5-EveGown',
				t6.EveGown as 'j6-EveGown',
				t7.EveGown as 'j7-EveGown',
				((t1.EveGown + t2.EveGown + t3.EveGown + t4.EveGown + t5.EveGown + t6.EveGown + t7.EveGown)/7) as 'AverageEveGown',
				t1.InitIntrvw as 'j1-InitIntrvw',
				t2.InitIntrvw as 'j2-InitIntrvw',
				t3.InitIntrvw as 'j3-InitIntrvw',
				t4.InitIntrvw as 'j4-InitIntrvw',
				t5.InitIntrvw as 'j5-InitIntrvw',
				t6.InitIntrvw as 'j6-InitIntrvw',
				t7.InitIntrvw as 'j7-InitIntrvw',
				((t1.InitIntrvw + t2.InitIntrvw + t3.InitIntrvw + t4.InitIntrvw + t5.InitIntrvw + t6.InitIntrvw + t7.InitIntrvw)/7) as 'AverageInitIntrvw',
				t1.Production as 'j1-Production',
				t2.Production as 'j2-Production',
				t3.Production as 'j3-Production',
				t4.Production as 'j4-Production',
				t5.Production as 'j5-Production',
				t6.Production as 'j6-Production',
				t7.Production as 'j7-Production',
				((t1.Production + t2.Production + t3.Production + t4.Production + t5.Production + t6.Production + t7.Production)/7) as 'AverageProduction',
				t1.SeqIntrvw as 'j1-SeqIntrvw',
				t2.SeqIntrvw as 'j2-SeqIntrvw',
				t3.SeqIntrvw as 'j3-SeqIntrvw',
				t4.SeqIntrvw as 'j4-SeqIntrvw',
				t5.SeqIntrvw as 'j5-SeqIntrvw',
				t6.SeqIntrvw as 'j6-SeqIntrvw',
				t7.SeqIntrvw as 'j7-SeqIntrvw',
				((t1.SeqIntrvw + t2.SeqIntrvw + t3.SeqIntrvw + t4.SeqIntrvw + t5.SeqIntrvw + t7.SeqIntrvw)/6) as 'AverageSeqIntrvw',
				t1.ThemeWr as 'j1-ThemeWr',
				t2.ThemeWr as 'j2-ThemeWr',
				t3.ThemeWr as 'j3-ThemeWr',
				t4.ThemeWr as 'j4-ThemeWr',
				t5.ThemeWr as 'j5-ThemeWr',
				t6.ThemeWr as 'j6-ThemeWr',
				t7.ThemeWr as 'j7-ThemeWr',
				((t1.ThemeWr + t2.ThemeWr + t3.ThemeWr + t4.ThemeWr + t5.ThemeWr + t6.ThemeWr + t7.ThemeWr)/7) as 'AverageThemeWr',
				t1.SQ_Confidence as 'j1-SQ_Confidence',
				t2.SQ_Confidence as 'j2-SQ_Confidence',
				t3.SQ_Confidence as 'j3-SQ_Confidence',
				t4.SQ_Confidence as 'j4-SQ_Confidence',
				t5.SQ_Confidence as 'j5-SQ_Confidence',
				t6.SQ_Confidence as 'j6-SQ_Confidence',
				t7.SQ_Confidence as 'j7-SQ_Confidence',
				t1.SQ_Content as 'j1-SQ_Content',
				t2.SQ_Content as 'j2-SQ_Content',
				t3.SQ_Content as 'j3-SQ_Content',
				t4.SQ_Content as 'j4-SQ_Content',
				t5.SQ_Content as 'j5-SQ_Content',
				t6.SQ_Content as 'j6-SQ_Content',
				t7.SQ_Content as 'j7-SQ_Content',
				t1.SQ_Wit as 'j1-SQ_Wit',
				t2.SQ_Wit as 'j2-SQ_Wit',
				t3.SQ_Wit as 'j3-SQ_Wit',
				t4.SQ_Wit as 'j4-SQ_Wit',
				t5.SQ_Wit as 'j5-SQ_Wit',
				t6.SQ_Wit as 'j6-SQ_Wit',
				t7.SQ_Wit as 'j7-SQ_Wit'

				from
				/*special project*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,col.`collegeCode` cCode
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				group by candidates
				ORDER BY can.id) t0
				/*end*/
				,
				/*judge1*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 8
				group by candidates
				ORDER BY can.id) t1
				/*end*/
				,
				/*judge2*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 9
				group by candidates
				ORDER BY can.id) t2
				/*end*/
				,
				/*judge3*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 10
				group by candidates
				ORDER BY can.id) t3
				/*end*/
				,
				/*judge4*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 11
				group by candidates
				ORDER BY can.id) t4
				/*end*/
				,
				/*judge5*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 12
				group by candidates
				ORDER BY can.id) t5
				/*end*/
				,
				/*judge6*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 13
				group by candidates
				ORDER BY can.id) t6
				/*end*/
				,
				/*judge7*/
				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 14
				group by candidates
				ORDER BY can.id) t7
				/*end*/

				where
				t0.candidates=t1.candidates and t1.candidates=t2.candidates and
				t2.candidates=t3.candidates and t3.candidates=t4.candidates and
				t4.candidates=t5.candidates and t5.candidates=t6.candidates and
				t6.candidates=t7.candidates
				ORDER BY t0.id
		) table_pn
			,
		(select
			t0.id,
			t0.cCode,
				t0.candidates,
				t0.SP as 'SP',
			t1.talent as 'judge1',
				t2.talent as 'judge2',
				t3.talent as 'judge3',
			(t1.talent+t2.talent+t3.talent)/3 as AverageTalent,
			t4.speech as 'judge4',
				t5.speech as 'judge5',
				t6.speech as 'judge6',
			(t4.speech+t5.speech+t6.speech)/3 as AverageSpeech,
			(t0.SP*.16) as 'SP_sixteen',
			((t1.talent+t2.talent+t3.talent)/3)*.34 as 'Talent_34',
			((t4.speech+t5.speech+t6.speech)/3)*.50 as 'Speech_50',
			(t0.SP*.16)+((t1.talent+t2.talent+t3.talent)/3)*.34+((t4.speech+t5.speech+t6.speech)/3)*.50 as 'TotalPrepageant'

			from
			/*special project*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,sum(pre.SP_RS) SP
				,col.`collegeCode` cCode
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			group by candidates
			ORDER BY can.id) t0
			/*end*/
			,
			/*talent judge1*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,Talent_Confidence
				,Talent_Mastery
				,Talent_StagePresence
				,Talent_OverallImpact
				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 2
			group by candidates
			ORDER BY can.id) t1
			/*end*/
			,
			/*talent judge2*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,Talent_Confidence
				,Talent_Mastery
				,Talent_StagePresence
				,Talent_OverallImpact
				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 3
			group by candidates
			ORDER BY can.id) t2
			/*end*/
			,
			/*talent judge3*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,Talent_Confidence
				,Talent_Mastery
				,Talent_StagePresence
				,Talent_OverallImpact
				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 4
			group by candidates
			ORDER BY can.id) t3
			/*end*/
			,
			/*speech judge4*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,PSpch_Content
				,PSpch_Delivery
				,PSpch_Spontainety
				,PSpch_Defense
				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 5 #replace with judge id ie: 4,5 or 6
			group by candidates
			ORDER BY can.id) t4
			/*end*/
			,
			/*speech judge5*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,PSpch_Content
				,PSpch_Delivery
				,PSpch_Spontainety
				,PSpch_Defense
				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 6 #replace with judge id ie: 4,5 or 6
			group by candidates
			ORDER BY can.id) t5
			/*end*/
			,
			/*speech judge6*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,pre.judge
				,PSpch_Content
				,PSpch_Delivery
				,PSpch_Spontainety
				,PSpch_Defense
				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
			from prepageants pre
			left join candidates can on can.id=pre.candidate
			left join colleges col on col.id=can.college
			WHERE pre.judge = 7 #replace with judge id ie: 4,5 or 6
			group by candidates
			ORDER BY can.id) t6
			/*end*/

			where
			t0.candidates=t1.candidates and t1.candidates=t2.candidates and
			t2.candidates=t3.candidates and t3.candidates=t4.candidates and
			t4.candidates=t5.candidates and t5.candidates=t6.candidates
		) table_pre

	where
		pressLaunch.candidates = table_pn.candidates and table_pn.candidates = table_pre.candidates and table_pre.candidates = ded1.candidates
  order by
    totalInitial desc
	"));


$finalScore = DB::select(DB::raw("
	select
		initialScore.id,
		initialScore.cCode,
		initialScore.candidates,
		initialScore.totalInitial,
		seqQuestion.Average_SQ_Total,
		(initialScore.totalInitial * .5) initial_fifty,
		(seqQuestion.Average_SQ_Total * .5) sq_fifty,
		(( initialScore.totalInitial * .5 ) + ( seqQuestion.Average_SQ_Total * .5 )) finalScore
	from
		(select
  		pressLaunch.id,
  		table_pn.cCode,
  		pressLaunch.candidates,
  		pressLaunch.PL_score as 'pressLaunchScore',
  		(( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) prepageantTotal,
  		(pressLaunch.PL_score * .1)  pressLaunch_tenpercent,
  		(((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) pageantNight_sixtypercent,
  		((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3) prepageant_thirtypercent,
  		((pressLaunch.PL_score * .1) + (((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) + ((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3)) beforeInitial,
  		ded1.deduct deductions,
  		(((pressLaunch.PL_score * .1) + (((table_pn.AverageProduction*.10) + (table_pn.AverageThemeWr*.25) + (table_pn.AverageEveGown*.25) + (table_pn.AverageSeqIntrvw*.10) + (table_pn.AverageInitIntrvw*.30)) * .6) + ((( table_pre.AverageSpeech * .5 ) + ( table_pre.AverageTalent * .34 ) + ( table_pre.SP * .16 )) * .3)) - ded1.deduct) totalInitial
  	from
  		(select
  			can.id
  			,concat(upper(can.lName),', ',can.fName) candidates
  			,PL_RS as 'PL_score'
  			from press_launches p
  			left join candidates can on can.id=p.candidate
  			left join colleges col on col.id=can.college
  			group by candidates
  			ORDER BY can.id
  		) pressLaunch
  			,
  		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  			,init.deductions deduct
  			from initial_scores init
  			left join candidates can on can.id=init.candidate
  			left join colleges col on col.id=can.college
  			WHERE init.judge = 1
  			group by candidates
  			ORDER BY can.id) ded1
  				,
  		(select
  				t0.id,
  				t0.cCode,
  				t0.candidates,
  				t1.EveGown as 'j1-EveGown',
  				t2.EveGown as 'j2-EveGown',
  				t3.EveGown as 'j3-EveGown',
  				t4.EveGown as 'j4-EveGown',
  				t5.EveGown as 'j5-EveGown',
  				t6.EveGown as 'j6-EveGown',
  				t7.EveGown as 'j7-EveGown',
  				((t1.EveGown + t2.EveGown + t3.EveGown + t4.EveGown + t5.EveGown + t6.EveGown + t7.EveGown)/7) as 'AverageEveGown',
  				t1.InitIntrvw as 'j1-InitIntrvw',
  				t2.InitIntrvw as 'j2-InitIntrvw',
  				t3.InitIntrvw as 'j3-InitIntrvw',
  				t4.InitIntrvw as 'j4-InitIntrvw',
  				t5.InitIntrvw as 'j5-InitIntrvw',
  				t6.InitIntrvw as 'j6-InitIntrvw',
  				t7.InitIntrvw as 'j7-InitIntrvw',
  				((t1.InitIntrvw + t2.InitIntrvw + t3.InitIntrvw + t4.InitIntrvw + t5.InitIntrvw + t6.InitIntrvw + t7.InitIntrvw)/7) as 'AverageInitIntrvw',
  				t1.Production as 'j1-Production',
  				t2.Production as 'j2-Production',
  				t3.Production as 'j3-Production',
  				t4.Production as 'j4-Production',
  				t5.Production as 'j5-Production',
  				t6.Production as 'j6-Production',
  				t7.Production as 'j7-Production',
  				((t1.Production + t2.Production + t3.Production + t4.Production + t5.Production + t6.Production + t7.Production)/7) as 'AverageProduction',
  				t1.SeqIntrvw as 'j1-SeqIntrvw',
  				t2.SeqIntrvw as 'j2-SeqIntrvw',
  				t3.SeqIntrvw as 'j3-SeqIntrvw',
  				t4.SeqIntrvw as 'j4-SeqIntrvw',
  				t5.SeqIntrvw as 'j5-SeqIntrvw',
  				t6.SeqIntrvw as 'j6-SeqIntrvw',
  				t7.SeqIntrvw as 'j7-SeqIntrvw',
  				((t1.SeqIntrvw + t2.SeqIntrvw + t3.SeqIntrvw + t4.SeqIntrvw + t5.SeqIntrvw + t7.SeqIntrvw)/6) as 'AverageSeqIntrvw',
  				t1.ThemeWr as 'j1-ThemeWr',
  				t2.ThemeWr as 'j2-ThemeWr',
  				t3.ThemeWr as 'j3-ThemeWr',
  				t4.ThemeWr as 'j4-ThemeWr',
  				t5.ThemeWr as 'j5-ThemeWr',
  				t6.ThemeWr as 'j6-ThemeWr',
  				t7.ThemeWr as 'j7-ThemeWr',
  				((t1.ThemeWr + t2.ThemeWr + t3.ThemeWr + t4.ThemeWr + t5.ThemeWr + t6.ThemeWr + t7.ThemeWr)/7) as 'AverageThemeWr',
  				t1.SQ_Confidence as 'j1-SQ_Confidence',
  				t2.SQ_Confidence as 'j2-SQ_Confidence',
  				t3.SQ_Confidence as 'j3-SQ_Confidence',
  				t4.SQ_Confidence as 'j4-SQ_Confidence',
  				t5.SQ_Confidence as 'j5-SQ_Confidence',
  				t6.SQ_Confidence as 'j6-SQ_Confidence',
  				t7.SQ_Confidence as 'j7-SQ_Confidence',
  				t1.SQ_Content as 'j1-SQ_Content',
  				t2.SQ_Content as 'j2-SQ_Content',
  				t3.SQ_Content as 'j3-SQ_Content',
  				t4.SQ_Content as 'j4-SQ_Content',
  				t5.SQ_Content as 'j5-SQ_Content',
  				t6.SQ_Content as 'j6-SQ_Content',
  				t7.SQ_Content as 'j7-SQ_Content',
  				t1.SQ_Wit as 'j1-SQ_Wit',
  				t2.SQ_Wit as 'j2-SQ_Wit',
  				t3.SQ_Wit as 'j3-SQ_Wit',
  				t4.SQ_Wit as 'j4-SQ_Wit',
  				t5.SQ_Wit as 'j5-SQ_Wit',
  				t6.SQ_Wit as 'j6-SQ_Wit',
  				t7.SQ_Wit as 'j7-SQ_Wit'

  				from
  				/*special project*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,col.`collegeCode` cCode
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				group by candidates
  				ORDER BY can.id) t0
  				/*end*/
  				,
  				/*judge1*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 8
  				group by candidates
  				ORDER BY can.id) t1
  				/*end*/
  				,
  				/*judge2*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 9
  				group by candidates
  				ORDER BY can.id) t2
  				/*end*/
  				,
  				/*judge3*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 10
  				group by candidates
  				ORDER BY can.id) t3
  				/*end*/
  				,
  				/*judge4*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 11
  				group by candidates
  				ORDER BY can.id) t4
  				/*end*/
  				,
  				/*judge5*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 12
  				group by candidates
  				ORDER BY can.id) t5
  				/*end*/
  				,
  				/*judge6*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 13
  				group by candidates
  				ORDER BY can.id) t6
  				/*end*/
  				,
  				/*judge7*/
  				(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  					,init.judge
  					,IS_EveGown_Grace
  					,IS_EveGown_Poise
  					,IS_EveGown_Projection
  					,IS_EveGown_Regal
  					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
  					,IS_InitIntrvw_Confidence
  					,IS_InitIntrvw_Content
  					,IS_InitIntrvw_Delivery
  					,IS_InitIntrvw_Wit
  					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
  					,IS_Production_Confidence
  					,IS_Production_Mastery
  					,IS_Production_OverallImpact
  					,IS_Production_StagePresence
  					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
  					,IS_SeqIntrvw_Confidence
  					,IS_SeqIntrvw_Content
  					,IS_SeqIntrvw_Delivery
  					,IS_SeqIntrvw_Wit
  					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
  					,IS_ThemeWr_Grace
  					,IS_ThemeWr_Poise
  					,IS_ThemeWr_Projection
  					,IS_ThemeWr_Relevance
  					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
  					,SQ_Confidence
  					,SQ_Content
  					,SQ_Wit
  				from initial_scores init
  				left join candidates can on can.id=init.candidate
  				left join colleges col on col.id=can.college
  				WHERE init.judge = 14
  				group by candidates
  				ORDER BY can.id) t7
  				/*end*/

  				where
  				t0.candidates=t1.candidates and t1.candidates=t2.candidates and
  				t2.candidates=t3.candidates and t3.candidates=t4.candidates and
  				t4.candidates=t5.candidates and t5.candidates=t6.candidates and
  				t6.candidates=t7.candidates
  				ORDER BY t0.id
  		) table_pn
  			,
  		(select
  			t0.id,
  			t0.cCode,
  				t0.candidates,
  				t0.SP as 'SP',
  			t1.talent as 'judge1',
  				t2.talent as 'judge2',
  				t3.talent as 'judge3',
  			(t1.talent+t2.talent+t3.talent)/3 as AverageTalent,
  			t4.speech as 'judge4',
  				t5.speech as 'judge5',
  				t6.speech as 'judge6',
  			(t4.speech+t5.speech+t6.speech)/3 as AverageSpeech,
  			(t0.SP*.16) as 'SP_sixteen',
  			((t1.talent+t2.talent+t3.talent)/3)*.34 as 'Talent_34',
  			((t4.speech+t5.speech+t6.speech)/3)*.50 as 'Speech_50',
  			(t0.SP*.16)+((t1.talent+t2.talent+t3.talent)/3)*.34+((t4.speech+t5.speech+t6.speech)/3)*.50 as 'TotalPrepageant'

  			from
  			/*special project*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,sum(pre.SP_RS) SP
  				,col.`collegeCode` cCode
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			group by candidates
  			ORDER BY can.id) t0
  			/*end*/
  			,
  			/*talent judge1*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,Talent_Confidence
  				,Talent_Mastery
  				,Talent_StagePresence
  				,Talent_OverallImpact
  				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 2
  			group by candidates
  			ORDER BY can.id) t1
  			/*end*/
  			,
  			/*talent judge2*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,Talent_Confidence
  				,Talent_Mastery
  				,Talent_StagePresence
  				,Talent_OverallImpact
  				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 3
  			group by candidates
  			ORDER BY can.id) t2
  			/*end*/
  			,
  			/*talent judge3*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,Talent_Confidence
  				,Talent_Mastery
  				,Talent_StagePresence
  				,Talent_OverallImpact
  				,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 4
  			group by candidates
  			ORDER BY can.id) t3
  			/*end*/
  			,
  			/*speech judge4*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,PSpch_Content
  				,PSpch_Delivery
  				,PSpch_Spontainety
  				,PSpch_Defense
  				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 5 #replace with judge id ie: 4,5 or 6
  			group by candidates
  			ORDER BY can.id) t4
  			/*end*/
  			,
  			/*speech judge5*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,PSpch_Content
  				,PSpch_Delivery
  				,PSpch_Spontainety
  				,PSpch_Defense
  				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 6 #replace with judge id ie: 4,5 or 6
  			group by candidates
  			ORDER BY can.id) t5
  			/*end*/
  			,
  			/*speech judge6*/
  			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
  				,pre.judge
  				,PSpch_Content
  				,PSpch_Delivery
  				,PSpch_Spontainety
  				,PSpch_Defense
  				,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
  			from prepageants pre
  			left join candidates can on can.id=pre.candidate
  			left join colleges col on col.id=can.college
  			WHERE pre.judge = 7 #replace with judge id ie: 4,5 or 6
  			group by candidates
  			ORDER BY can.id) t6
  			/*end*/

  			where
  			t0.candidates=t1.candidates and t1.candidates=t2.candidates and
  			t2.candidates=t3.candidates and t3.candidates=t4.candidates and
  			t4.candidates=t5.candidates and t5.candidates=t6.candidates
  		) table_pre

  	where
  		pressLaunch.candidates = table_pn.candidates and table_pn.candidates = table_pre.candidates and table_pre.candidates = ded1.candidates
		) initialScore
		,
		(select
				t0.id,
				t0.cCode,
				t0.candidates,
				t1.EveGown as 'j1-EveGown',
				t2.EveGown as 'j2-EveGown',
				t3.EveGown as 'j3-EveGown',
				t4.EveGown as 'j4-EveGown',
				t5.EveGown as 'j5-EveGown',
				t6.EveGown as 'j6-EveGown',
				t7.EveGown as 'j7-EveGown',
				((t1.EveGown + t2.EveGown + t3.EveGown + t4.EveGown + t5.EveGown + t6.EveGown + t7.EveGown)/7) as 'AverageEveGown',
				t1.InitIntrvw as 'j1-InitIntrvw',
				t2.InitIntrvw as 'j2-InitIntrvw',
				t3.InitIntrvw as 'j3-InitIntrvw',
				t4.InitIntrvw as 'j4-InitIntrvw',
				t5.InitIntrvw as 'j5-InitIntrvw',
				t6.InitIntrvw as 'j6-InitIntrvw',
				t7.InitIntrvw as 'j7-InitIntrvw',
				((t1.InitIntrvw + t2.InitIntrvw + t3.InitIntrvw + t4.InitIntrvw + t5.InitIntrvw + t6.InitIntrvw + t7.InitIntrvw)/7) as 'AverageInitIntrvw',
				t1.Production as 'j1-Production',
				t2.Production as 'j2-Production',
				t3.Production as 'j3-Production',
				t4.Production as 'j4-Production',
				t5.Production as 'j5-Production',
				t6.Production as 'j6-Production',
				t7.Production as 'j7-Production',
				((t1.Production + t2.Production + t3.Production + t4.Production + t5.Production + t6.Production + t7.Production)/7) as 'AverageProduction',
				t1.SeqIntrvw as 'j1-SeqIntrvw',
				t2.SeqIntrvw as 'j2-SeqIntrvw',
				t3.SeqIntrvw as 'j3-SeqIntrvw',
				t4.SeqIntrvw as 'j4-SeqIntrvw',
				t5.SeqIntrvw as 'j5-SeqIntrvw',
				t6.SeqIntrvw as 'j6-SeqIntrvw',
				t7.SeqIntrvw as 'j7-SeqIntrvw',
				((t1.SeqIntrvw + t2.SeqIntrvw + t3.SeqIntrvw + t4.SeqIntrvw + t5.SeqIntrvw + t7.SeqIntrvw)/6) as 'AverageSeqIntrvw',
				t1.ThemeWr as 'j1-ThemeWr',
				t2.ThemeWr as 'j2-ThemeWr',
				t3.ThemeWr as 'j3-ThemeWr',
				t4.ThemeWr as 'j4-ThemeWr',
				t5.ThemeWr as 'j5-ThemeWr',
				t6.ThemeWr as 'j6-ThemeWr',
				t7.ThemeWr as 'j7-ThemeWr',
				((t1.ThemeWr + t2.ThemeWr + t3.ThemeWr + t4.ThemeWr + t5.ThemeWr + t6.ThemeWr + t7.ThemeWr)/7) as 'AverageThemeWr',
				t1.SQ_Confidence as 'j1-SQ_Confidence',
				t2.SQ_Confidence as 'j2-SQ_Confidence',
				t3.SQ_Confidence as 'j3-SQ_Confidence',
				t4.SQ_Confidence as 'j4-SQ_Confidence',
				t5.SQ_Confidence as 'j5-SQ_Confidence',
				t6.SQ_Confidence as 'j6-SQ_Confidence',
				t7.SQ_Confidence as 'j7-SQ_Confidence',
				t1.SQ_Content as 'j1-SQ_Content',
				t2.SQ_Content as 'j2-SQ_Content',
				t3.SQ_Content as 'j3-SQ_Content',
				t4.SQ_Content as 'j4-SQ_Content',
				t5.SQ_Content as 'j5-SQ_Content',
				t6.SQ_Content as 'j6-SQ_Content',
				t7.SQ_Content as 'j7-SQ_Content',
				t1.SQ_Wit as 'j1-SQ_Wit',
				t2.SQ_Wit as 'j2-SQ_Wit',
				t3.SQ_Wit as 'j3-SQ_Wit',
				t4.SQ_Wit as 'j4-SQ_Wit',
				t5.SQ_Wit as 'j5-SQ_Wit',
				t6.SQ_Wit as 'j6-SQ_Wit',
				t7.SQ_Wit as 'j7-SQ_Wit',
				t1.SQ_Total as 'j1_SQ_Total',
				t2.SQ_Total as 'j2_SQ_Total',
				t3.SQ_Total as 'j3_SQ_Total',
				t4.SQ_Total as 'j4_SQ_Total',
				t5.SQ_Total as 'j5_SQ_Total',
				t6.SQ_Total as 'j6_SQ_Total',
				t7.SQ_Total as 'j7_SQ_Total',
				((t1.SQ_Total + t2.SQ_Total + t3.SQ_Total + t4.SQ_Total + t5.SQ_Total + t6.SQ_Total + t7.SQ_Total)/7) as 'Average_SQ_Total'
				from
				/*special project*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
						,init.judge
						,col.`collegeCode` cCode
					from initial_scores init
					left join candidates can on can.id=init.candidate
					left join colleges col on col.id=can.college
					group by candidates
					ORDER BY can.id) t0
				/*end*/
					,
				/*judge1*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 8
				group by candidates
				ORDER BY can.id) t1
				/*end*/
					,
				/*judge2*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 9
				group by candidates
				ORDER BY can.id) t2
				/*end*/
					,
				/*judge3*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 10
				group by candidates
				ORDER BY can.id) t3
				/*end*/
					,
				/*judge4*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 11
				group by candidates
				ORDER BY can.id) t4
				/*end*/
					,
				/*judge5*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 12
				group by candidates
				ORDER BY can.id) t5
				/*end*/
					,
				/*judge6*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 13
				group by candidates
				ORDER BY can.id) t6
				/*end*/
					,
				/*judge7*/
					(select can.id,concat(upper(can.lName),', ',can.fName) candidates
					,init.judge
					,IS_EveGown_Grace
					,IS_EveGown_Poise
					,IS_EveGown_Projection
					,IS_EveGown_Regal
					,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
					,IS_InitIntrvw_Confidence
					,IS_InitIntrvw_Content
					,IS_InitIntrvw_Delivery
					,IS_InitIntrvw_Wit
					,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
					,IS_Production_Confidence
					,IS_Production_Mastery
					,IS_Production_OverallImpact
					,IS_Production_StagePresence
					,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
					,IS_SeqIntrvw_Confidence
					,IS_SeqIntrvw_Content
					,IS_SeqIntrvw_Delivery
					,IS_SeqIntrvw_Wit
					,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
					,IS_ThemeWr_Grace
					,IS_ThemeWr_Poise
					,IS_ThemeWr_Projection
					,IS_ThemeWr_Relevance
					,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
					,SQ_Confidence
					,SQ_Content
					,SQ_Wit
					,((SQ_Confidence*.20)+(SQ_Content*.60)+(SQ_Wit*.20)) SQ_Total
				from initial_scores init
				left join candidates can on can.id=init.candidate
				left join colleges col on col.id=can.college
				WHERE init.judge = 14
				group by candidates
				ORDER BY can.id) t7
				/*end*/

				where
					t0.candidates=t1.candidates and t1.candidates=t2.candidates and
					t2.candidates=t3.candidates and t3.candidates=t4.candidates and
					t4.candidates=t5.candidates and t5.candidates=t6.candidates and
					t6.candidates=t7.candidates
		) seqQuestion

		where
			initialScore.candidates = seqQuestion.candidates
		order by
			finalScore desc
    limit 5
"));

$bestSpeaker = DB::select(DB::raw("
	select
		table_pn.id,
		table_pn.cCode,
		table_pn.candidates,
		table_pre.AverageSpeech,
		table_pn.AverageInitIntrvw,
		((table_pre.AverageSpeech + table_pn.AverageInitIntrvw)/2) AverageSpeakerPoints
		from
		(select
			t0.id,
			t0.cCode,
			t0.candidates,
			t1.EveGown as 'j1-EveGown',
			t2.EveGown as 'j2-EveGown',
			t3.EveGown as 'j3-EveGown',
			t4.EveGown as 'j4-EveGown',
			t5.EveGown as 'j5-EveGown',
			t6.EveGown as 'j6-EveGown',
			t7.EveGown as 'j7-EveGown',
			((t1.EveGown + t2.EveGown + t3.EveGown + t4.EveGown + t5.EveGown + t6.EveGown + t7.EveGown)/7) as 'AverageEveGown',
			t1.InitIntrvw as 'j1-InitIntrvw',
			t2.InitIntrvw as 'j2-InitIntrvw',
			t3.InitIntrvw as 'j3-InitIntrvw',
			t4.InitIntrvw as 'j4-InitIntrvw',
			t5.InitIntrvw as 'j5-InitIntrvw',
			t6.InitIntrvw as 'j6-InitIntrvw',
			t7.InitIntrvw as 'j7-InitIntrvw',
			((t1.InitIntrvw + t2.InitIntrvw + t3.InitIntrvw + t4.InitIntrvw + t5.InitIntrvw + t6.InitIntrvw + t7.InitIntrvw)/7) as 'AverageInitIntrvw',
			t1.Production as 'j1-Production',
			t2.Production as 'j2-Production',
			t3.Production as 'j3-Production',
			t4.Production as 'j4-Production',
			t5.Production as 'j5-Production',
			t6.Production as 'j6-Production',
			t7.Production as 'j7-Production',
			((t1.Production + t2.Production + t3.Production + t4.Production + t5.Production + t6.Production + t7.Production)/7) as 'AverageProduction',
			t1.SeqIntrvw as 'j1-SeqIntrvw',
			t2.SeqIntrvw as 'j2-SeqIntrvw',
			t3.SeqIntrvw as 'j3-SeqIntrvw',
			t4.SeqIntrvw as 'j4-SeqIntrvw',
			t5.SeqIntrvw as 'j5-SeqIntrvw',
			t6.SeqIntrvw as 'j6-SeqIntrvw',
			t7.SeqIntrvw as 'j7-SeqIntrvw',
			((t1.SeqIntrvw + t2.SeqIntrvw + t3.SeqIntrvw + t4.SeqIntrvw + t5.SeqIntrvw + t6.SeqIntrvw + t7.SeqIntrvw)/7) as 'AverageSeqIntrvw',
			t1.ThemeWr as 'j1-ThemeWr',
			t2.ThemeWr as 'j2-ThemeWr',
			t3.ThemeWr as 'j3-ThemeWr',
			t4.ThemeWr as 'j4-ThemeWr',
			t5.ThemeWr as 'j5-ThemeWr',
			t6.ThemeWr as 'j6-ThemeWr',
			t7.ThemeWr as 'j7-ThemeWr',
			((t1.ThemeWr + t2.ThemeWr + t3.ThemeWr + t4.ThemeWr + t5.ThemeWr + t6.ThemeWr + t7.ThemeWr)/7) as 'AverageThemeWr',
			t1.SQ_Confidence as 'j1-SQ_Confidence',
			t2.SQ_Confidence as 'j2-SQ_Confidence',
			t3.SQ_Confidence as 'j3-SQ_Confidence',
			t4.SQ_Confidence as 'j4-SQ_Confidence',
			t5.SQ_Confidence as 'j5-SQ_Confidence',
			t6.SQ_Confidence as 'j6-SQ_Confidence',
			t7.SQ_Confidence as 'j7-SQ_Confidence',
			t1.SQ_Content as 'j1-SQ_Content',
			t2.SQ_Content as 'j2-SQ_Content',
			t3.SQ_Content as 'j3-SQ_Content',
			t4.SQ_Content as 'j4-SQ_Content',
			t5.SQ_Content as 'j5-SQ_Content',
			t6.SQ_Content as 'j6-SQ_Content',
			t7.SQ_Content as 'j7-SQ_Content',
			t1.SQ_Wit as 'j1-SQ_Wit',
			t2.SQ_Wit as 'j2-SQ_Wit',
			t3.SQ_Wit as 'j3-SQ_Wit',
			t4.SQ_Wit as 'j4-SQ_Wit',
			t5.SQ_Wit as 'j5-SQ_Wit',
			t6.SQ_Wit as 'j6-SQ_Wit',
			t7.SQ_Wit as 'j7-SQ_Wit'

			from
			/*special project*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,col.`collegeCode` cCode
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			group by candidates
			ORDER BY can.id) t0
			/*end*/
			,
			/*judge1*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 8
			group by candidates
			ORDER BY can.id) t1
			/*end*/
			,
			/*judge2*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 9
			group by candidates
			ORDER BY can.id) t2
			/*end*/
			,
			/*judge3*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 10
			group by candidates
			ORDER BY can.id) t3
			/*end*/
			,
			/*judge4*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 11
			group by candidates
			ORDER BY can.id) t4
			/*end*/
			,
			/*judge5*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 12
			group by candidates
			ORDER BY can.id) t5
			/*end*/
			,
			/*judge6*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 13
			group by candidates
			ORDER BY can.id) t6
			/*end*/
			,
			/*judge7*/
			(select can.id,concat(upper(can.lName),', ',can.fName) candidates
				,init.judge
				,IS_EveGown_Grace
				,IS_EveGown_Poise
				,IS_EveGown_Projection
				,IS_EveGown_Regal
				,(IS_EveGown_Grace+IS_EveGown_Poise+IS_EveGown_Projection+IS_EveGown_Regal) EveGown
				,IS_InitIntrvw_Confidence
				,IS_InitIntrvw_Content
				,IS_InitIntrvw_Delivery
				,IS_InitIntrvw_Wit
				,(IS_InitIntrvw_Confidence+IS_InitIntrvw_Content+IS_InitIntrvw_Delivery+IS_InitIntrvw_Wit) InitIntrvw
				,IS_Production_Confidence
				,IS_Production_Mastery
				,IS_Production_OverallImpact
				,IS_Production_StagePresence
				,(IS_Production_Confidence+IS_Production_Mastery+IS_Production_OverallImpact+IS_Production_StagePresence) Production
				,IS_SeqIntrvw_Confidence
				,IS_SeqIntrvw_Content
				,IS_SeqIntrvw_Delivery
				,IS_SeqIntrvw_Wit
				,(IS_SeqIntrvw_Confidence+IS_SeqIntrvw_Content+IS_SeqIntrvw_Delivery+IS_SeqIntrvw_Wit) SeqIntrvw
				,IS_ThemeWr_Grace
				,IS_ThemeWr_Poise
				,IS_ThemeWr_Projection
				,IS_ThemeWr_Relevance
				,(IS_ThemeWr_Grace+IS_ThemeWr_Poise+IS_ThemeWr_Projection+IS_ThemeWr_Relevance) ThemeWr
				,SQ_Confidence
				,SQ_Content
				,SQ_Wit
			from initial_scores init
			left join candidates can on can.id=init.candidate
			left join colleges col on col.id=can.college
			WHERE init.judge = 14
			group by candidates
			ORDER BY can.id) t7
			/*end*/

			where
			t0.candidates=t1.candidates and t1.candidates=t2.candidates and
			t2.candidates=t3.candidates and t3.candidates=t4.candidates and
			t4.candidates=t5.candidates and t5.candidates=t6.candidates and
			t6.candidates=t7.candidates

			ORDER BY t0.id
		) table_pn
		,
		(select
		t0.id,
		t0.cCode,
			t0.candidates,
			t0.SP as 'SP',
		t1.talent as 'judge1',
			t2.talent as 'judge2',
			t3.talent as 'judge3',
		(t1.talent+t2.talent+t3.talent)/3 as AverageTalent,
		t4.speech as 'judge4',
			t5.speech as 'judge5',
			t6.speech as 'judge6',
		(t4.speech+t5.speech+t6.speech)/3 as AverageSpeech,
		(t0.SP*.16) as 'SP_sixteen',
		((t1.talent+t2.talent+t3.talent)/3)*.34 as 'Talent_34',
		((t4.speech+t5.speech+t6.speech)/3)*.50 as 'Speech_50',
		(t0.SP*.16)+((t1.talent+t2.talent+t3.talent)/3)*.34+((t4.speech+t5.speech+t6.speech)/3)*.50 as 'TotalPrepageant'

		from
		/*special project*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,sum(pre.SP_RS) SP
			,col.`collegeCode` cCode
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		group by candidates
		ORDER BY can.id) t0
		/*end*/
		,
		/*talent judge1*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,Talent_Confidence
			,Talent_Mastery
			,Talent_StagePresence
			,Talent_OverallImpact
			,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 2
		group by candidates
		ORDER BY can.id) t1
		/*end*/
		,
		/*talent judge2*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,Talent_Confidence
			,Talent_Mastery
			,Talent_StagePresence
			,Talent_OverallImpact
			,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 3
		group by candidates
		ORDER BY can.id) t2
		/*end*/
		,
		/*talent judge3*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,Talent_Confidence
			,Talent_Mastery
			,Talent_StagePresence
			,Talent_OverallImpact
			,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 4
		group by candidates
		ORDER BY can.id) t3
		/*end*/
		,
		/*speech judge4*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,PSpch_Content
			,PSpch_Delivery
			,PSpch_Spontainety
			,PSpch_Defense
			,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 5 #replace with judge id ie: 4,5 or 6
		group by candidates
		ORDER BY can.id) t4
		/*end*/
		,
		/*speech judge5*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,PSpch_Content
			,PSpch_Delivery
			,PSpch_Spontainety
			,PSpch_Defense
			,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 6 #replace with judge id ie: 4,5 or 6
		group by candidates
		ORDER BY can.id) t5
		/*end*/
		,
		/*speech judge6*/
		(select can.id,concat(upper(can.lName),', ',can.fName) candidates
			,pre.judge
			,PSpch_Content
			,PSpch_Delivery
			,PSpch_Spontainety
			,PSpch_Defense
			,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
		from prepageants pre
		left join candidates can on can.id=pre.candidate
		left join colleges col on col.id=can.college
		WHERE pre.judge = 7 #replace with judge id ie: 4,5 or 6
		group by candidates
		ORDER BY can.id) t6
		/*end*/

		where
		t0.candidates=t1.candidates and t1.candidates=t2.candidates and
		t2.candidates=t3.candidates and t3.candidates=t4.candidates and
		t4.candidates=t5.candidates and t5.candidates=t6.candidates
		) table_pre

		where
		table_pn.candidates = table_pre.candidates

		order by
		AverageSpeakerPoints DESC
"));

  $standardQuestion = DB::select(DB::raw($sql.' order by Average_SQ_Total desc limit 5'));
  // dd($sql.' order by Average_SQ_Total desc limit 5');
	return view('maintenance.maintenance',compact('judges','organizers','candidates', 'colleges','prepageants','initScores','prePajFinal', 'reports','pressLaunchScores','initialScores','initialScoreSummary','finalScore','bestSpeaker','standardQuestion','checkTop'));
}

}
