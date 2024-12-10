<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class Address extends \iLaravel\Core\iApp\Model
{
    use useLocationCity;
    public static $s_prefix = 'ILL';
    public static $s_start = 1155;
    public static $s_end = 18446744073709551615;
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(imodal('User'), 'creator_id');
    }
    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'city_id' => "nullable|exists:cities,id",
                    'title' => "required|string",
                    'text' => "required|string",
                    'postcode' => "required|string",
                    'longitude' => "required|longitude",
                    'latitude' => "required|latitude",
                    'description' => "required|string",
                    'phone' => "required|string",
                    'is_default' => "nullable|boolean",
                    'status' => 'nullable|in:' . join(',', iconfig('status.addresses', iconfig('status.global'))),
                ]);
                break;
        }
        return $rules;
    }
    public function additionalUpdate($request = null, $additional = null, $parent = null)
    {
        if ($request->get('cities')) {
            $cities = $request->get('cities');
            $this->city_id = end($cities);
        }
        parent::additionalUpdate($request, $additional, $parent);
    }
}
