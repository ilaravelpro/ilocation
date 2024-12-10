<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/15/20, 1:10 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\ResourceData;
use iLaravel\Core\iApp\Type;

class CityData  extends ResourceData
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        try {
            if ($request->has('parent') && $request->parent == 0) {
                if ($this->parent)
                    $data['text'] = implode('->',[ $this->parent->title_text , implode(' ',[ $this->type_text , $data['text']])]);
                else {
                    $data['text'] = implode(' ',[ $this->type_text , $data['text']]);
                }
            }
        }catch (\Throwable $exception) {}
        $cities = $this->cities;
        $data['cities'] = $cities->count();
        if ($type = Type::findByName($this->type))
            $data['type_text'] = $type->title;
        if ($cities->count())
            $data['type_child_text'] = implode('/', app('ilaravel_types')->whereIn('name',$cities->pluck('type')->unique()->toArray())->values()->pluck('title')->toArray());
        return $data;
    }
}
