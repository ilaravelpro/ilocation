<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\Location;


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
                'name' => 'title',
                'title' => _t('title'),
                'type' => 'text'
            ],
            [
                'name' => 'summery',
                'title' => _t('summery'),
                'type' => 'text'
            ],
            [
                'name' => 'content',
                'title' => _t('content'),
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
