<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:29 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('continent_id')->unsigned();
            $table->foreign('continent_id')->references('id')->on('location_continents')->onDelete('cascade');
            $table->string('name');
            $table->string('continent');
            $table->string('capital');
            $table->string('area');
            $table->string('population');
            $table->string('tld');
            $table->string('phone');
            $table->string('languages');
            $table->string('neighbors');
            $table->string('currency_code', 4);
            $table->string('currency_name');
            $table->string('postal_code_format');
            $table->string('postal_code_regex');
            $table->string('iso_alpha2', 3);
            $table->string('iso_alpha3', 4);
            $table->string('iso_numeric');
            $table->string('fips');
            $table->string('fips_equivalent');
            $table->mediumText('types');
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
        Schema::dropIfExists('location_countries');
    }
}
