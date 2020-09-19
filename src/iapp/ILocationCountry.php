<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use Illuminate\Database\Eloquent\Model;

class ILocationCountry extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ILLC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    public $with = ['cities'];

    public function cities()
    {
        return $this->hasMany(imodal('ILocationCity'), 'country_id')->where('master', 1);
    }
}
