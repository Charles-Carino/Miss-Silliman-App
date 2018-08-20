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
            $table->string('image')->nullable();
            $table->string('fName')->nullable(); //Candidate's First Name
            $table->string('mName')->nullable(); //Candidate's Middle Name
            $table->string('lName')->nullable(); //Candidate's Last Name
            $table->integer('college')->unsigned(); //Candidate's College
            $table->string('yearLevel')->nullable(); //Candidate's Year Level
            $table->string('SY')->nullable(); //Candidate's SY attended
            $table->string('isTop')->nullable(); //Candidate's ranking
            $table->string('number')->nullable(); //Candidate's number
            $table->string('seqSpeech')->nullable(); //Candidate's seqSpeech number
            $table->string('seqTalent')->nullable(); //Candidate's seqTalent number
            $table->string('aveTalent')->nullable(); //Candidate's aveTalent
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
