<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:11 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('location_cities')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('prefix')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('type')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->longText('coordinates')->nullable();
            $table->string('geoname')->nullable();
            $table->boolean('master')->default(0);
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
        Schema::dropIfExists('location_cities');
    }
}
