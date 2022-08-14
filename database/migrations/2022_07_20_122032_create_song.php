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
            $table->increments('Song_id')->primary();
            $table->string('Type')->nullable(true);
            $table->string('Name')->nullable(true);
            $table->string('Artist_fname')->nullable(false);
            $table->string('Artist_lname')->nullable(true);
            $table->string('Album_name')->nullable(false);
            $table->date('Album_date')->nullable(false);
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
