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
          $table->string('fName')->nullable(); //User's First Name
          $table->string('mName')->nullable(); //User's Middle Name
          $table->string('lName')->nullable(); //User's Last Name
          $table->string('userType')->nullable(); //User's Type either Judge or Organizer
          $table->string('position')->nullable(); //User's Position either chair, vp etc.
          $table->string('event')->nullable(); //User's Event if talent, speech or final
          $table->string('roles')->nullable(); //User's Role if admin or judge
          $table->string('username')->nullable(); //User's username
          $table->string('password')->nullable(); //User's password
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
