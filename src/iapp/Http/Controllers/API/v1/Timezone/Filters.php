<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\Timezone;


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
                'name' => 'gmt_offset',
                'title' => _t('gmt_offset'),
                'type' => 'text'
            ],
            [
                'name' => 'dst_offset',
                'title' => _t('dst_offset'),
                'type' => 'text'
            ],
            [
                'name' => 'raw_offset',
                'title' => _t('raw_offset'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }
}
