<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\ApiController;
use iLaravel\Core\Vendor\iRole\iRole;


class CityController extends ApiController
{
    public $order_default = [['code' => 'cities.code','asc']];

    public $order_list = ['id', 'title', 'name', 'prefix', 'code', 'type', 'longitude', 'latitude', 'coordinates', 'geoname', 'master', 'status'];
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
                'name' => 'prefix',
                'title' => _t('prefix'),
                'type' => 'text'
            ],
            [
                'name' => 'code',
                'title' => _t('code'),
                'type' => 'text'
            ],
            [
                'name' => 'country',
                'title' => _t('country'),
                'type' => 'text'
            ],
            [
                'name' => 'type',
                'title' => _t('type'),
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
            ],
            [
                'name' => 'geoname',
                'title' => _t('geoname'),
                'type' => 'text'
            ],
            [
                'name' => 'parent_id',
                'title' => _t('parent'),
                'type' => 'text'
            ],
        ];
        $model->with('parent');
        return [$filters, [], $operators];
    }
    public function requestFilter($request, $model, $parent, $current, $filters, $operators)
    {
        list($filters, $current) = parent::requestFilter($request, $model, $parent, $current, $filters, $operators);
        if (\request()->no_check_parent != 1) {
            $parentSet = \request()->has('parent') ? (boolean)\request()->parent : true;
            if ($parentSet && !@$current['parent_id']) {
                $model->where('cities.'  . 'parent_id', null)->orWhere('cities.'  . 'parent_id', '<=', 0);
            }
        }
        return [$filters, $current];
    }
}
