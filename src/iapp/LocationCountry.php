<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;


class LocationCountry extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILCC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $casts = [
        'coordinates' => 'array',
    ];

    protected $guarded = [];

    public $with = ['cities'];

    public function cities()
    {
        return $this->hasMany(imodal('LocationCity'), 'country_id')->where('master', 1);
    }
}
