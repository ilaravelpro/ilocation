<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\LocationLine;


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
                'name' => 'text',
                'title' => _t('text'),
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'title' => _t('description'),
                'type' => 'text'
            ],
            [
                'name' => 'zip',
                'title' => _t('zip'),
                'type' => 'text'
            ],
            [
                'name' => 'longitude',
                'title' => _t('longitude'),
                'type' => 'text'
            ],
            [
                'name' => 'latitude',
                'title' => _t('latitude'),
                'type' => 'text'
            ]
        ];
        return [$filters, [], $operators];
    }
}
