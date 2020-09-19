<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use Illuminate\Database\Eloquent\Model;

class ILocationCity extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ILLCC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected $hidden = ['parent_id', 'country_id'];
    public $with = ['cities', 'country'];

    public function country()
    {
        return $this->belongsTo(imodal('ILocationCountry'), 'country_id');
    }

    public function parent()
    {
        return $this->belongsTo(imodal('ILocationCity'), 'parent_id');
    }

    public function cities()
    {
        return $this->hasMany(imodal('ILocationCity'), 'parent_id');
    }
}
