<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\LocationLine;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['store', 'update']) && isset($data['cities']) && count($data['cities'])) {
            $cities = $data['cities'];
            $last_city = end($cities);
            $data['city_id'] = is_array($last_city) && isset($last_city['value']) ? $last_city['value'] : $last_city;
            $cityModel = imodal('LocationCity');
            $data['city_id'] = $cityModel::id($data['city_id']);
        }
    }
}
