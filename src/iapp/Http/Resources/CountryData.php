<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\ResourceData;

class CountryData extends ResourceData
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['value'] = $this->iso_alpha2 ? : strtolower($this->iso_alpha3);
        if ($this->cities->count())
            $data['type_child_text'] = implode('/', app('ilaravel_types')->whereIn('name',$this->cities->pluck('type')->unique()->toArray())->values()->pluck('title')->toArray());
        return $data;
    }
}
