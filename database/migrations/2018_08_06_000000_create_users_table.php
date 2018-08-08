<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('U_FName'); //User's First Name
          $table->string('U_MName'); //User's Middle Name
          $table->string('U_LName'); //User's Last Name
          $table->string('U_UserType'); //User's Type either Judge or Organizer
          $table->string('U_Position'); //User's Position either chair, vp etc.
          $table->string('U_Event'); //User's Event if talent, speech or final
          $table->string('U_Roles'); //User's Role if admin or judge
          $table->string('username'); //User's username
          $table->string('password'); //User's password
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
        Schema::dropIfExists('users');
    }
}
