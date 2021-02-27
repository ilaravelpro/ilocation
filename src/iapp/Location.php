<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class Location extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'IL';
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

    public function creator()
    {
        return $this->belongsTo(imodal('User'));
    }

    public function city() {
        return $this->belongsTo(imodal('LocationCity'), 'city_id');
    }

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
                $rules = ["creator_id" => "required|exists:users,id"];
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|string",
                    'lines' => "required|string",
                    'zip' => "required|string",
                    'longitude' => "required|longitude",
                    'latitude' => "required|latitude",
                    'details' => "required|string",
                    'default' => "nullable|boolean",
                ]);
                break;
        }
        return $rules;
    }
}
