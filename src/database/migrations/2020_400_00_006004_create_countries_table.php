<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:29 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('title');
            $table->string('name');
            $table->string('continent')->nullable();
            $table->string('capital')->nullable();
            $table->string('area')->nullable();
            $table->string('population')->nullable();
            $table->string('tld')->nullable();
            $table->string('phone_codes')->nullable();
            $table->string('languages')->nullable();
            $table->string('neighbors')->nullable();
            $table->string('currency_code', 4)->nullable();
            $table->string('currency_name')->nullable();
            $table->string('postal_code_format')->nullable();
            $table->string('postal_code_regex')->nullable();
            $table->string('iso_alpha2', 3)->nullable();
            $table->string('iso_alpha3', 4)->nullable();
            $table->string('iso_numeric')->nullable();
            $table->string('fips')->nullable();
            $table->string('fips_equivalent')->nullable();
            $table->string('type')->nullable();
            $table->longText('coordinates')->nullable();
            $table->string('geoname')->nullable();
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
        Schema::dropIfExists('countries');
    }
};
