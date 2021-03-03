<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

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

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'ip' => "required|ip" . ($request->type == 'ipv6' ? ':6': ''),
                    'isp' => "nullable|string",
                    'type' => 'required|' . (imodal('Type') ? 'exists:types,name' : 'string'),
                    'status' => 'nullable|in:' . join(iconfig('status.location_ips', iconfig('status.global')), ','),
                ]);
                break;
        }
        return $rules;
    }
}
