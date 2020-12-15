<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongtblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songtbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('artist');
            /*$table->foreign('artistname')->references('name')->on('artist')->onDelete('SET NULL');*/
            $table->string('singer');
            /*$table->foreign('singername')->references('name')->on('singer')->onDelete('SET NULL');*/
            $table->string('type');
            $table->string('year');
            $table->string('country');
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
        Schema::dropIfExists('songtbl');
    }
}
