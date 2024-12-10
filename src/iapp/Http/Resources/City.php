<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class City extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        if ($this->parent_id){
            $data['parent_id'] = [
                'text' => $this->parent->title,
                'value' => $this->parent->serial,
                'id' => $this->parent->serial,
            ];
        }
        if ($this->timezone_id){
            $data['timezone_id'] = [
                'text' => $this->timezone->title,
                'value' => $this->timezone->serial,
            ];
        }
        $countryModel = imodal('Country');
        $country = $countryModel::findByISOAlpha2($this->country);
        $data['country'] = $country? [
            'text' => $country->title,
            'value' => $country->iso_alpha2,
            'id' => $country->serial,
        ]: $this->country;
        $typeModel = imodal('Type');
        $type = $typeModel::findByName($this->type);
        $data['type'] = $type? [
            'text' => $type->title,
            'value' => $type->name,
            'id' => $type->serial,
        ]: $this->type;
        unset($data['creator_id']);
        return $data;
    }
}
