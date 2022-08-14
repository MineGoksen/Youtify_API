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
            $table->increments('id')->primary();
            $table->string('Fname')->nullable(false);
            $table->string('Lname')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamps();
        });
        Schema::create('user', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('member');
            $table->string('user_name')->unique()->nullable(false);
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
