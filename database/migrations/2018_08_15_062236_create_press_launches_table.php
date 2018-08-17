<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressLaunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_launches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate')->unsigned();
            $table->integer('organizer')->unsigned();
            $table->integer('PL_RS')->nullable();
            $table->string('read')->nullable();
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
        Schema::dropIfExists('press_launches');
    }
}
