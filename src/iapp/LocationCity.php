<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class LocationCity extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILCCC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected $hidden = ['parent_id', 'country_id', 'lines'];

    protected $casts = [
        'master' => 'boolean',
        'coordinates' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(imodal('LocationCountry'), 'country', 'iso_alpha2');
    }

    public function timezone()
    {
        return $this->belongsTo(imodal('Timezone'), 'timezone_id');
    }

    public function parent()
    {
        return $this->belongsTo(imodal('LocationCity'), 'parent_id');
    }

    public function cities()
    {
        return $this->hasMany(imodal('LocationCity'), 'parent_id');
    }

    public function lines()
    {
        return $this->hasMany(imodal('LocationLine'), 'city_id');
    }

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'parent_id' => "nullable|exists:location_cities,id",
                    'timezone_id' => "nullable|exists:timezones,id",
                    'country' => "nullable|exists:location_countries,iso_alpha2",
                    'title' => "required|string",
                    'name' => "nullable|string",
                    'prefix' => "nullable|string",
                    'code' => "nullable|string",
                    'master' => "nullable|boolean",
                    'type' => 'nullable|' . (imodal('Type') ? 'exists:types,name' : 'string'),
                    'longitude' => "nullable|longitude",
                    'latitude' => "nullable|latitude",
                    'coordinates.*.lon' => "nullable|longitude",
                    'coordinates.*.lat' => "nullable|latitude",
                    'geoname' => "nullable|string",
                    'status' => 'nullable|in:' . join(iconfig('status.location_cities', iconfig('status.global')), ','),
                ]);
                break;
        }
        return $rules;
    }

    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }
}
