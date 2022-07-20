<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song', function (Blueprint $table) {
            $table->increments('Song_id');
            $table->string('Type');
            $table->string('Name');
            $table->string('Artist_fname');
            $table->string('Artist_lname');
            $table->string('Album_name');
            $table->date('Album_date');
            $table->foreign(['Album_name','Album_date'])->references(['Name','Date'])->on('album');
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
        Schema::dropIfExists('song');
    }
}
