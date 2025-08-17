<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 3/4/21, 8:57 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Traits;
trait SaveAddress
{
    public function saveAddress($data, $name = "address") {
        $address = [];
        if (!empty($data["cities"])) {
            $cities = @$data["cities"];
            $address['city_id'] = imodal('City')::id(end($cities));
        }
        $address['title'] = empty($data["title"]) ? $this->title : $data["title"];
        foreach (["text", "postcode"] as $index)
            $address[$index] = empty($data[$index]) ? null : $data[$index];
        foreach (["longitude", "latitude"] as $index)
            $address[$index] = empty($data[$index]) ? null : (doubleval($data[$index])?:null);
        $this->$name()->updateOrCreate(['title' => $address['title']], $address);
        return tap($this->$name ?: $this->$name()->create())->update($address);
    }
}
