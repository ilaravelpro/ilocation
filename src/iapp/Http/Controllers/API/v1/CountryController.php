<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\ApiController;


class CountryController extends ApiController
{
    public $order_list = ['id', 'continent', 'capital', 'area', 'population', 'tld', 'phone', 'languages', 'neighbors', 'currency_code', 'currency_name', 'postal_code_format', 'postal_code_regex', 'iso_alpha2', 'iso_alpha3', 'iso_numeric', 'fips', 'fips_equivalent', 'geoname', 'status'];

    public function filters($request, $model, $parent = null, $operators = [])
    {
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'title',
                'title' => _t('title'),
                'type' => 'text'
            ],
            [
                'name' => 'name',
                'title' => _t('name'),
                'type' => 'text'
            ],
            [
                'name' => 'continent',
                'title' => _t('continent'),
                'type' => 'text'
            ],
            [
                'name' => 'capital',
                'title' => _t('capital'),
                'type' => 'text'
            ],
            [
                'name' => 'area',
                'title' => _t('area'),
                'type' => 'text'
            ],
            [
                'name' => 'population',
                'title' => _t('population'),
                'type' => 'text'
            ],
            [
                'name' => 'tld',
                'title' => _t('tld'),
                'type' => 'text'
            ],
            [
                'name' => 'phone',
                'title' => _t('phone'),
                'type' => 'text'
            ],
            [
                'name' => 'languages',
                'title' => _t('languages'),
                'type' => 'text'
            ],
            [
                'name' => 'neighbors',
                'title' => _t('neighbors'),
                'type' => 'text'
            ],
            [
                'name' => 'currency_code',
                'title' => _t('currency_code'),
                'type' => 'text'
            ],
            [
                'name' => 'currency_name',
                'title' => _t('currency_name'),
                'type' => 'text'
            ],
            [
                'name' => 'postal_code_format',
                'title' => _t('postal_code_format'),
                'type' => 'text'
            ],
            [
                'name' => 'postal_code_regex',
                'title' => _t('postal_code_regex'),
                'type' => 'text'
            ],
            [
                'name' => 'iso_alpha2',
                'title' => _t('iso_alpha2'),
                'type' => 'text'
            ],
            [
                'name' => 'iso_alpha3',
                'title' => _t('iso_alpha3'),
                'type' => 'text'
            ],
            [
                'name' => 'iso_numeric',
                'title' => _t('iso_numeric'),
                'type' => 'text'
            ],
            [
                'name' => 'fips',
                'title' => _t('fips'),
                'type' => 'text'
            ],
            [
                'name' => 'fips_equivalent',
                'title' => _t('fips_equivalent'),
                'type' => 'text'
            ],
            [
                'name' => 'geoname',
                'title' => _t('geoname'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }
}
