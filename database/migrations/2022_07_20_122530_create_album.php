<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbum extends Migration
{
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->string('Name')->nullable(false);
            $table->date('Date')->nullable(false);
            $table->timestamps();
            $table->primary(array('Name', 'Date'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
