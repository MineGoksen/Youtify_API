<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_list', function (Blueprint $table) {
            $table->increments('List_id');
            $table->timestamps();
            $table->string('Name');
            $table->unsignedBigInteger('Member_id');
            $table->date('Create_date');
            $table->foreign('Member_id')->references('id')->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_list');
    }
}
