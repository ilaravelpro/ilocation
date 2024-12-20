<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\ApiController;


class ContinentController extends ApiController
{
    public $order_list = ['id', 'code', 'name', 'geoname'];

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
                'name' => 'code',
                'title' => _t('code'),
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
