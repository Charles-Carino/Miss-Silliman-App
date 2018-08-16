<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrepageantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('prepageants', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('candidate')->unsigned(); //Candidate
              $table->integer('judge')->unsigned(); //Judge
              $table->decimal('SP_RS',8,2)->nullable(); //Raw score of Special Project
              $table->decimal('Talent_Confidence',8,2)->nullable(); //Talent Raw Score
              $table->decimal('Talent_Mastery',8,2)->nullable(); //Talent Raw Score
              $table->decimal('Talent_StagePresence',8,2)->nullable(); //Talent Raw Score
              $table->decimal('Talent_OverallImpact',8,2)->nullable(); //Talent Raw Score
              $table->decimal('PSpch_Content',8,2)->nullable(); //Platform Speech Raw Score
              $table->decimal('PSpch_Delivery',8,2)->nullable(); //Platform Speech Raw Score
              $table->decimal('PSpch_Spontainety',8,2)->nullable(); //Platform Speech Raw Score
              $table->decimal('PSpch_Defense',8,2)->nullable(); //Platform Speech Raw Score
              $table->decimal('SP_Prcnt',8,2)->nullable(); //Special Projects Percentage
              $table->decimal('Talent_Prcnt',8,2)->nullable(); //Talent Percentage
              $table->decimal('PSpch_Prcnt',8,2)->nullable(); //Platform Speach Percentage
              $table->decimal('sub_total',8,2)->nullable(); //Partial score of the Prepageant

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
        Schema::dropIfExists('prepageants');
    }
}
