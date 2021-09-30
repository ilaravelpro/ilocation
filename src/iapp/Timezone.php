<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class Timezone extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILT';
    public static $s_start = 1155;
    public static $s_end = 18446744073709551615;
    protected $guarded = [];
    public function country()
    {
        return $this->belongsTo(imodal('LocationCountry'), 'country', 'iso_alpha2');
    }

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|regex:/^[A-Za-z\/]*$/",
                    'country' => "nullable|exists:location_countries,iso_alpha2",
                    'gmt_offset' => "required|double:0,3",
                    'dst_offset' => "required|double:0,3",
                    'raw_offset' => "required|double:0,3",
                    'status' => 'nullable|in:' . join( ',', iconfig('status.timezones', iconfig('status.global'))),
                ]);
                break;
        }
        return $rules;
    }
}
