<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judges', function (Blueprint $table) {
            $table->increments('J_ID');
            $table->string('J_FName'); //Judge's First Name
            $table->string('J_MName'); //Judge's Middle Name
            $table->string('J_LName'); //Judge's Last Name
            $table->string('J_Event'); //Judge's Current Event
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
        Schema::dropIfExists('judges');
    }
}
