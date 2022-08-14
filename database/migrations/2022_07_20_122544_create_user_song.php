<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSong extends Migration{
    public function up()
    {
        Schema::create('user_song', function (Blueprint $table) {
            $table->boolean('Like')->nullable(false);
            $table->string('User_name')->nullable(false);
            $table->unsignedBigInteger('Song_id')->nullable(false);
            $table->text('Comment_text')->nullable(true);
            $table->foreign('Song_id')->references('Song_id')->on('song');
            $table->foreign('User_name')->references('user_name')->on('user');
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
        Schema::dropIfExists('user_song');
    }
}
