<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 8:13 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Policies;

use iLaravel\Core\Vendor\iRole\iRolePolicy;

class LocationPolicy extends iRolePolicy
{
    public $prefix = 'locations';
    public $model = 'Location';
}
