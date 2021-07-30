<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_product', function (Blueprint $table) {
            $table->id();
            $table->bigIncrements('id');//otomatik artan deger
            $table->timestamps();
            $table->string('name',150);//yanina en fazla uzunlugunu yazdik
            $table->text('description')->nullable();
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_product');
    }
}
