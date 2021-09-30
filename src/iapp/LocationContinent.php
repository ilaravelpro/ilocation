<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class LocationContinent extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILC';
    public static $s_start = 0;
    public static $s_end = 30;

    protected $casts = [
        'coordinates' => 'array',
    ];

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|string",
                    'name' => "nullable|string",
                    'code' => "nullable|regex:/^[A-Za-z]{1,3}$/",
                    'coordinates.*.lon' => "nullable|longitude",
                    'coordinates.*.lat' => "nullable|latitude",
                    'geoname' => "nullable|string",
                    'status' => 'nullable|in:' . join(',', iconfig('status.location_continents', iconfig('status.global'))),
                ]);
                break;
        }
        return $rules;
    }

    public static function findByCode($code)
    {
        return static::where('code', $code)->first();
    }
}
