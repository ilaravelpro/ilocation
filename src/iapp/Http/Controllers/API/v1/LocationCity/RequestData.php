<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/19/20, 8:18 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\LocationCity;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['store', 'update']) && isset($data['country'])) {
            $data['country'] = is_array($data['country']) && isset($data['country']['value']) ? $data['country']['value'] : $data['country'];
        }
        if (in_array($action, ['store', 'update']) && isset($data['type'])) {
            $data['type'] = is_array($data['type']) && isset($data['type']['value']) ? $data['type']['value'] : $data['type'];
        }
        if (in_array($action, ['store', 'update']) && isset($data['timezone_id'])) {
            $data['timezone_id'] = is_array($data['timezone_id']) && isset($data['timezone_id']['value']) ? $data['timezone_id']['value'] : $data['timezone_id'];
            $timezoneModel = imodal('Timezone');
            $data['timezone_id'] = $timezoneModel::id($data['timezone_id']);
        }
        if (in_array($action, ['store', 'update']) && isset($data['parent_id'])) {
            $data['parent_id'] = is_array($data['parent_id']) && isset($data['parent_id']['value']) ? $data['parent_id']['value'] : $data['parent_id'];
            $data['parent_id'] = $this->model::id($data['parent_id']);
            unset($data['parent']);
        }
    }
}
