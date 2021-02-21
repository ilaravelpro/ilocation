<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

class LocationCity extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILCC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected $hidden = ['parent_id', 'country_id', 'lines'];
    public $with = ['cities', 'country'];

    protected $casts = [
        'coordinates' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(imodal('LocationCountry'), 'country_id');
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
}
