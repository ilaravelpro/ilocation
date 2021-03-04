<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class LocationLine extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        if ($this->city) {
            $locationCityData = iresource('LocationCityData');
            $data = insert_into_array($data, 'city_id', 'cities',$locationCityData::collection($this->cities()));
        }
        if ($this->country)
            $data = insert_into_array($data, 'city_id', 'country', [
                'text' => $this->country->title,
                'value' => $this->country->iso_alpha2,
                'id' => $this->country->serial,
            ]);
        if (isset($data['pivot']))
            unset($data['actions']);
        unset($data['pivot']);
        unset($data['city_id']);
        unset($data['creator_id']);
        return $data;
    }
}
