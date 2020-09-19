<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use Illuminate\Database\Eloquent\Model;

class ILocation extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;


    public static $s_prefix = 'ILL';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected $casts = [
        'coordinate' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        parent::deleting(function (self $event) {
            self::resetRecordsId();
        });
    }

    public function city() {
        return $this->belongsTo(imodal('ILocationCity'), 'city_id');
    }
}
