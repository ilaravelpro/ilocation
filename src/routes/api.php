<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:20 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->middleware('auth:api')->group(function () {
    if (ilocation('routes.api.locations.status')) Route::apiResource('locations', 'LocationController', ['as' => 'api']);
    if (ilocation('routes.api.continents.status')) Route::apiResource('location_continents', 'LocationContinentController', ['as' => 'api']);
    if (ilocation('routes.api.countries.status')) Route::apiResource('location_countries', 'LocationCountryController', ['as' => 'api']);
    if (ilocation('routes.api.cities.status')) Route::apiResource('location_cities', 'LocationCityController', ['as' => 'api']);
    if (ilocation('routes.api.lines.status')) Route::apiResource('location_lines', 'LocationLineController', ['as' => 'api']);
    if (ilocation('routes.api.ips.status')) Route::apiResource('location_ips', 'LocationIpController', ['as' => 'api']);
    if (ilocation('routes.api.timezones.status')) Route::apiResource('timezones', 'TimezoneController', ['as' => 'api']);
});
