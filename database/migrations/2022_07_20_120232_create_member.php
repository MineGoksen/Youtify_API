<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//veritabanında tablonun oluşturulması isleminin kodları
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        Schema::create('user', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('member');
            $table->string('user_name')->unique();
        });

        Schema::create('manager', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('manager');
        Schema::dropIfExists('member');
    }
}
