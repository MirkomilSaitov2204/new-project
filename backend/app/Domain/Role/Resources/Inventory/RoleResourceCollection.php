<?php

namespace Domain\Role\Resources\Inventory;

use Infrastructure\Interfaces\BaseResourceCollection;

class RoleResourceCollection extends BaseResourceCollection
{

    public $collects = 'Domain\Role\Resources\Inventory\RoleResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  $this->collection;
    }
}
