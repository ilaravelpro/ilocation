<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:20 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('locations', 'ILocationController', ['as' => 'api','except' => ['store','update','destroy']]);
});
