<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 3/1/21, 12:13 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iLocation\iApp\Http\Controllers\API\v1\LocationCity;


use Illuminate\Http\Request;

trait RequestFilter
{
    public function requestFilter($request, $model, $parent, $current, $filters, $operators)
    {
        $filters[count($filters) - 1]['rule'] = function ($filter) {
            (new Request((array) $filter))->validate([
                'value' =>  $this->model::findByName($filter->value) ? 'required|string' :'required|exists_serial:LocationCity',
            ]);
            return $filter;
        };
        list($filters, $current) = parent::requestFilter($request, $model, $parent, $current, $filters, $operators);
        $parentSet = $request->has('parent') ? (boolean) $request->parent : true;
        if ((!isset($current['parent']) || !$current['parent']) && $parentSet){
            $model->where('parent_id', null)->orWhere('parent_id','<=', 0);
        }
        return [$filters, $current];
    }

}
