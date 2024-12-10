<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 3/4/21, 8:57 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp;


trait useLocationCity
{
    public function getCountryAttribute()
    {
        $countryModel = imodal('Country');
        return $this->city->country ? $countryModel::findByISOAlpha2($this->city->country) : null;
    }

    public function city() {
        return $this->belongsTo(imodal('City'), 'city_id');
    }

    public function cities() {
        $cities = collect();
        if ($this->city){
            $cities->push($this->city);
            $parent = $this->city->parent;
            while ($parent) {
                $cities->push($parent);
                $parent = $parent->parent;
            }
            $cities = $cities->sortKeysDesc();
        }
        $cities->model = $this->city()->getRelated();
        return $cities;
    }
}
