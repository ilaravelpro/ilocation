<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:20 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->middleware('authIf:api')->group(function () {
    if (ilocation('routes.api.continents.status')) Route::apiResource('continents', 'ContinentController', ['as' => 'api']);
    if (ilocation('routes.api.countries.status')) Route::apiResource('countries', 'CountryController', ['as' => 'api']);
    if (ilocation('routes.api.cities.status')) Route::apiResource('cities', 'CityController', ['as' => 'api']);
    if (ilocation('routes.api.addresses.status')) Route::apiResource('addresses', 'AddressController', ['as' => 'api']);
    if (ilocation('routes.api.timezones.status')) Route::apiResource('timezones', 'TimezoneController', ['as' => 'api']);
});
