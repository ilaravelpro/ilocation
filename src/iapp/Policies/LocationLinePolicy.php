<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 8:13 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Policies;

use iLaravel\Core\Vendor\iRole\iRolePolicy;

class LocationLinePolicy extends iRolePolicy
{
    public $prefix = 'location_lines';
    public $model = 'LocationLine';
}
