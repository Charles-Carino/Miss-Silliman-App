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
            $table->increments('id');
            $table->string('image');
            $table->string('fName'); //Candidate's First Name
            $table->string('mName'); //Candidate's Middle Name
            $table->string('lName'); //Candidate's Last Name
            $table->integer('college')->unsigned(); //Candidate's College
            $table->string('yearLevel'); //Candidate's Year Level
            $table->string('SY'); //Candidate's SY attended
            $table->string('isTop'); //Candidate's ranking
            $table->string('number'); //Candidate's number
            $table->string('seqSpeech'); //Candidate's seqSpeech number
            $table->string('seqTalent'); //Candidate's seqTalent number
            $table->string('aveTalent'); //Candidate's aveTalent
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
