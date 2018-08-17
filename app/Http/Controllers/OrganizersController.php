<?php

namespace App\Http\Controllers;
use App\User;
use App\Organizers;
use App\Candidates;
use App\Colleges;
use App\Prepageants;
use App\InitialScores;
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



        $reports = DB::select(DB::raw("select
        	t0.id,
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
        	(t0.SP*.16) as 'SP16%',
        	((t1.talent+t2.talent+t3.talent)/3)*.34 as 'Talent34%',
        	((t4.speech+t5.speech+t6.speech)/3)*.50 as 'Speech50%',
        	(t0.SP*.16)+((t1.talent+t2.talent+t3.talent)/3)*.34+((t4.speech+t5.speech+t6.speech)/3)*.50 as 'TotalPrepageant'

        from
        /*special project*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
        		,pre.judge
        		,sum(pre.SP_RS) SP
        	from prepageants pre
        	left join candidates can on can.id=pre.candidate
        	left join colleges col on col.id=can.college
        	group by candidates
        	ORDER BY can.id) t0
        /*end*/
        	,
        /*talent judge1*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
        		,pre.judge
        		,Talent_Confidence
        		,Talent_Mastery
        		,Talent_StagePresence
        		,Talent_OverallImpact
        		,(Talent_Confidence+Talent_Mastery+Talent_StagePresence+Talent_OverallImpact) talent
        	from prepageants pre
        	left join candidates can on can.id=pre.candidate
        	left join colleges col on col.id=can.college
        	WHERE pre.judge = 1
        	group by candidates
        	ORDER BY can.id) t1
        /*end*/
        	,
        /*talent judge2*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
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
        	ORDER BY can.id) t2
        /*end*/
        	,
        /*talent judge3*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
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
        	ORDER BY can.id) t3
        /*end*/
        	,
        /*speech judge4*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
        		,pre.judge
        		,PSpch_Content
        		,PSpch_Delivery
        		,PSpch_Spontainety
        		,PSpch_Defense
        		,(PSpch_Content+PSpch_Delivery+PSpch_Spontainety+PSpch_Defense) speech
        	from prepageants pre
        	left join candidates can on can.id=pre.candidate
        	left join colleges col on col.id=can.college
        	WHERE pre.judge = 4 #replace with judge id ie: 4,5 or 6
        	group by candidates
        	ORDER BY can.id) t4
        /*end*/
        	,
        /*speech judge5*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
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
        	ORDER BY can.id) t5
        /*end*/
        	,
        /*speech judge6*/
        	(select can.id,concat(upper(can.lName),', ',can.fName,' - ',col.`collegeCode`) candidates
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
        	ORDER BY can.id) t6
        /*end*/

        where
        	t0.candidates=t1.candidates and t1.candidates=t2.candidates and
        	t2.candidates=t3.candidates and t3.candidates=t4.candidates and
        	t4.candidates=t5.candidates and t5.candidates=t6.candidates

        order by TotalPrepageant desc;
"));
// dd($reports);
        return view('maintenance.maintenance',compact('judges','organizers','candidates', 'colleges','prepageants','initScores','prePajFinal', 'reports'));
    }
}
