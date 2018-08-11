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
          $table->string('fName'); //User's First Name
          $table->string('mName'); //User's Middle Name
          $table->string('lName'); //User's Last Name
          $table->string('userType'); //User's Type either Judge or Organizer
          $table->string('position'); //User's Position either chair, vp etc.
          $table->string('event'); //User's Event if talent, speech or final
          $table->string('roles'); //User's Role if admin or judge
          $table->string('username'); //User's username
          $table->string('password'); //User's password
          $table->timestamps();
          $table->rememberToken();
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
