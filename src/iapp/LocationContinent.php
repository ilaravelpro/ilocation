<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;


class LocationContinent extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILC';
    public static $s_start = 0;
    public static $s_end = 30;

    protected $casts = [
        'coordinates' => 'array',
    ];
}
