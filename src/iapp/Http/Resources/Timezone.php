<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class Timezone extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $continentModel = imodal('LocationCountry');
        $country = $continentModel::findByISOAlpha2($this->country);
        $data['country'] = $country? [
            'text' => $country->title,
            'value' => $country->iso_alpha2,
            'id' => $country->serial,
        ]: $this->country;
        unset($data['creator_id']);
        return $data;
    }
}
