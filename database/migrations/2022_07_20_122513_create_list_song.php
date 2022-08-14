<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSong extends Migration
{
    public function up()
    {
        Schema::create('list_song', function (Blueprint $table) {
            $table->unsignedBigInteger('List_id')->nullable(false);
            $table->unsignedBigInteger('Song_id')->nullable(false);
            $table->foreign('List_id')->references('List_id')->on('user_list');
            $table->foreign('Song_id')->references('Song_id')->on('song');
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
        Schema::dropIfExists('list_song');
    }
}
