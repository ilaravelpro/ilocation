<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class Country extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $continentModel = imodal('Continent');
        $continent = $continentModel::findByCode($this->continent);
        $data['continent'] = $continent? [
            'text' => $continent->title,
            'value' => $continent->code,
            'id' => $continent->serial,
        ]: $this->continent;
        unset($data['creator_id']);
        return $data;
    }
}
