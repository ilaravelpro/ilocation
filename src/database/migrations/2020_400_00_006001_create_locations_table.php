<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:34 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('creator_id');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('location_cities')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('lines')->nullable();
            $table->string('zip')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->text('details')->nullable();
            $table->boolean('default')->default(0);
            $table->string('status')->default('active');
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
        Schema::dropIfExists('locations');
    }
}
