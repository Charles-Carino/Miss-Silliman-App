<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventInitialscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_initialscore', function (Blueprint $table) {
            $table->increments('F_ID');
            $table->string('Cand_ID');
            $table->string('J_ID');
            $table->float('IS_Production_RS',8,2); //Production Raw Score
            $table->float('IS_ThemeWr_RS',8,2); //Theme Wear Raw Score
            $table->float('IS_EveGown_RS',8,2); //Evening Gown Raw Score
            $table->float('IS_SeqIntrvw_RS',8,2); //Sequence Interview Raw Score
            $table->float('IS_InitIntrvw_RS',8,2); //Initial Interview Raw Score
            $table->float('IS_Production_Prcnt',8,2); //Production Percentage
            $table->float('IS_ThemeWr_Prcnt',8,2); //Theme Wear Percentage
            $table->float('IS_EveGown_Prcnt',8,2); //Evening Gown Percentage
            $table->float('IS_SeqIntrvw_Prcnt',8,2); //Sequence Interview Percentage
            $table->float('IS_InitIntrvw_Prcnt',8,2); //Initial Interview Percentage
            $table->float('IS_SubTotal',8,2); //Initial Score Subtotal
            $table->float('SQ_Content_RS',8,2); //Standard Question Content Raw Score
            $table->float('SQ_Confidence_RS',8,2); //Standard Question Confidence Raw Score
            $table->float('SQ_Wit_RS',8,2); //Standard Question Wit Raw Score
            $table->float('SQ_Content_Prcnt',8,2); //Standard Question Content Percentage
            $table->float('SQ_Confidence_Prcnt',8,2); //Standard Question Confidence Percentage
            $table->float('SQ_Wit_Prcnt',8,2); //Standard Question Wit Percentage
            $table->float('SQ_SubTotal',8,2); //Standard Question Subtotal
            //
            // $table->foreign('candidate')->references('candidates')->on('id');
            // $table->foreign('judge')->references('judges')->on('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_initialscore');
    }
}
