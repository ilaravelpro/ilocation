<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\ResourceData;

class LocationCityData  extends ResourceData
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['cities'] = $this->cities->count();
        return $data;
    }
}
