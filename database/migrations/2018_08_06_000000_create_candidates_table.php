<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('candidates', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2018_07_24_153857_create_candidates_table.php
            $table->increments('id');
            $table->string('image');
=======
            $table->increments('Cand_ID');
>>>>>>> 37d1c6bd5afae28536b8cf5c33698e39da6d41b2:database/migrations/2018_08_06_000000_create_candidates_table.php
            $table->string('C_FName'); //Candidate's First Name
            $table->string('C_MName'); //Candidate's Middle Name
            $table->string('C_LName'); //Candidate's Last Name
            $table->integer('C_College')->unsigned(); //Candidate's College
            $table->string('C_YearLevel'); //Candidate's Year Level
            $table->string('C_SY'); //Candidate's SY attended
            $table->string('C_isTop'); //Candidate's ranking
            $table->string('C_Number'); //Candidate's number
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
        Schema::dropIfExists('candidates');
    }
}
