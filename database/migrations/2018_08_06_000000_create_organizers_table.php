<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->increments('O_ID');
            $table->string('O_FName'); //Organizer's First Name
            $table->string('O_MName'); //Organizer's Middle Name
            $table->string('O_LName'); //Organizer's Last Name
            $table->string('O_Position'); //Organizer's Position
            $table->integer('O_isAdmin'); //Organizer's Admin Status
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('organizers');
    }
}
