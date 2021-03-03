<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\LocationIp;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'ip',
                'title' => _t('ip'),
                'type' => 'text'
            ],
            [
                'name' => 'isp',
                'title' => _t('isp'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }
}
