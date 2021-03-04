<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Data;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Store;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Update;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Destroy;


class LocationCountryController extends Controller
{
    public $order_list = ['id', 'continent', 'capital', 'area', 'population', 'tld', 'phone', 'languages', 'neighbors', 'currency_code', 'currency_name', 'postal_code_format', 'postal_code_regex', 'iso_alpha2', 'iso_alpha3', 'iso_numeric', 'fips', 'fips_equivalent', 'geoname', 'status'];

    use Index,
        Data,
        Show,
        Store,
        Update,
        Destroy,
        LocationCountry\Filters,
        LocationCountry\RequestData;
}
