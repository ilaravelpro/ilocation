<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class Country extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILCC';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $casts = [
        'coordinates' => 'array',
        'phone_codes' => 'array',
        'languages' => 'array',
        'neighbors' => 'array',
    ];

    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(imodal('City'), 'country', 'iso_alpha2')->whereNull('parent_id');
    }

    public function rules(Request $request, $action, $parent = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|string",
                    'name' => "nullable|string",
                    'continent' => "nullable|exists:continents,code",
                    'capital' => "nullable|string",
                    'area' => "nullable|string",
                    'population' => "nullable|string",
                    'tld' => "nullable|tld",
                    'phone_codes.*' => "nullable|regex:/^[0-9+-]*$/",
                    'languages.*' => "nullable|regex:/^[a-zA-Z-]{1,5}$/",
                    'neighbors.*' => "nullable|regex:/^[a-zA-Z-]{1,5}$/",
                    'currency_code.*' => "nullable|string|max:4",
                    'currency_name.*' => "nullable|string|max:10",
                    'postal_code_format' => 'nullable|format_input',
                    'postal_code_regex' => "nullable|input_regex",
                    'iso_alpha2' => "nullable|regex:/^[A-Za-z]{1,3}$/",
                    'iso_alpha3' => "nullable|regex:/^[A-Za-z]{1,4}$/",
                    'iso_numeric' => "nullable|numeric|max:9999",
                    'coordinates.*.lon' => "nullable|longitude",
                    'coordinates.*.lat' => "nullable|latitude",
                    'geoname' => "nullable|string",
                    'status' => 'nullable|in:' . join(',', iconfig('status.countries', iconfig('status.global'))),
                ]);
                break;
        }
        return $rules;
    }

    public static function findByISOAlpha2($iso)
    {
        return static::where('iso_alpha2', $iso)->first();
    }
}
