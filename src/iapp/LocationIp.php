<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;


class LocationIp extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILIP';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        parent::deleting(function (self $event) {
            self::resetRecordsId();
        });
    }

    public function city() {
        return $this->belongsTo(imodal('LocationCity'), 'city_id');
    }

    public static function findByIP($ip) {
        return static::where('ip', $ip)->first();
    }
}
