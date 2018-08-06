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
        Schema::enableForeignKeyConstraints();
        Schema::create('event_presslaunch', function (Blueprint $table) {
            $table->increments('PL_ID');
            $table->float('PL_RS',8,2);
<<<<<<< HEAD:database/migrations/2018_07_24_154658_create_event_presslaunch_table.php
=======
            $table->integer('candidate')->unsigned();
            $table->integer('judge')->unsigned();

            //I have concerns for the foreign key for both the candidate
            //and the judge. What would their references from the candidates
            //and the judges tables respectively since the names are separated
            //as attributes?
            // $table->foreign('candidate')->references('candidates')->on('id');
            // $table->foreign('judge')->references('judges')->on('id');

            //true will edit it -Koya
            //editted it
>>>>>>> 37d1c6bd5afae28536b8cf5c33698e39da6d41b2:database/migrations/2018_08_06_000000_create_event_presslaunch_table.php
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
