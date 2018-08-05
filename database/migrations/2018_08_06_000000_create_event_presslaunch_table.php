<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPresslaunchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_presslaunch', function (Blueprint $table) {
            $table->increments('PL_ID');
            $table->float('PL_RS',8,2);
            $table->string('Cand_ID');
            $table->string('J_ID');

            //I have concerns for the foreign key for both the candidate
            //and the judge. What would their references from the candidates
            //and the judges tables respectively since the names are separated
            //as attributes?
            // $table->foreign('candidate')->references('candidates')->on('id');
            // $table->foreign('judge')->references('judges')->on('id');

            //true will edit it -Koya
            //editted it
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
        Schema::dropIfExists('event_presslaunch');
    }
}
