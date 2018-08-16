<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::enableForeignKeyConstraints();
         Schema::create('initial_scores', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('candidate')->unsigned(); //Candidate
             $table->integer('judge')->unsigned(); //Judge
             $table->float('IS_Production_RS',8,2)->nullable(); //Production Raw Score
             $table->float('IS_ThemeWr_RS',8,2)->nullable(); //Theme Wear Raw Score
             $table->float('IS_EveGown_RS',8,2)->nullable(); //Evening Gown Raw Score
             $table->float('IS_SeqIntrvw_RS',8,2)->nullable(); //Sequence Interview Raw Score
             $table->float('IS_InitIntrvw_RS',8,2)->nullable(); //Initial Interview Raw Score
             $table->float('IS_Production_Prcnt',8,2)->nullable(); //Production Percentage
             $table->float('IS_ThemeWr_Prcnt',8,2)->nullable(); //Theme Wear Percentage
             $table->float('IS_EveGown_Prcnt',8,2)->nullable(); //Evening Gown Percentage
             $table->float('IS_SeqIntrvw_Prcnt',8,2)->nullable(); //Sequence Interview Percentage
             $table->float('IS_InitIntrvw_Prcnt',8,2)->nullable(); //Initial Interview Percentage
             $table->float('IS_SubTotal',8,2)->nullable(); //Initial Score Subtotal
             $table->float('SQ_Content_RS',8,2)->nullable(); //Standard Question Content Raw Score
             $table->float('SQ_Confidence_RS',8,2)->nullable(); //Standard Question Confidence Raw Score
             $table->float('SQ_Wit_RS',8,2)->nullable(); //Standard Question Wit Raw Score
             $table->float('SQ_Content_Prcnt',8,2)->nullable(); //Standard Question Content Percentage
             $table->float('SQ_Confidence_Prcnt',8,2)->nullable(); //Standard Question Confidence Percentage
             $table->float('SQ_Wit_Prcnt',8,2)->nullable(); //Standard Question Wit Percentage
             $table->float('SQ_SubTotal',8,2)->nullable(); //Standard Question Subtotal
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
        Schema::dropIfExists('initial_scores');
    }
}
