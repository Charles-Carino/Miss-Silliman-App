<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPrepageantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('event_prepageant', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2018_07_24_160917_create_event_prepageant_table.php
            $table->increments('id');
            $table->integer('candidate')->unsigned(); //Candidate
            $table->integer('judge')->unsigned(); //Judge
=======
            $table->increments('PP_ID');
            $table->string('Cand_ID');
            $table->string('J_ID');
>>>>>>> 37d1c6bd5afae28536b8cf5c33698e39da6d41b2:database/migrations/2018_08_06_000000_create_event_prepageant_table.php
            $table->float('SP_RS',8,2); //Raw score of Special Project
            $table->float('Talent_RS',8,2); //Talent Raw Score
            $table->float('PSPch_RS',8,2); //Platform Speech Raw Score
            $table->float('SP_Prcnt',8,2); //Special Projects Percentage
            $table->float('Talent_Prcnt',8,2); //Talent Percentage
            $table->float('PSpch_Prcnt',8,2); //Platform Speach Percentage
            $table->float('sub_total',8,2); //Partial score of the Prepageant


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
        Schema::dropIfExists('event_prepageant');
    }
}
