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
    use useLocationCity;
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
                    'city_id' => "nullable|exists:location_cities,id",
                    'ip' => "required|ip" . ($request->type == 'ipv6' ? ':6': ''),
                    'isp' => "nullable|string",
                    'version' => 'required|in:4,6',
                    'status' => 'nullable|in:' . join(iconfig('status.location_ips', iconfig('status.global')), ','),
                ]);
                break;
        }
        return $rules;
    }
}
