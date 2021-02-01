<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use Illuminate\Database\Eloquent\Model;

class ILocationLine extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ILLL';
    public static $s_start = 1155;
    public static $s_end = 18446744073709551615;

    protected $guarded = [];

    protected $hidden = ['city_id'];
    public $with = ['city'];

    public function city()
    {
        return $this->belongsTo(imodal('ILocationCity'), 'city_id');
    }
}
