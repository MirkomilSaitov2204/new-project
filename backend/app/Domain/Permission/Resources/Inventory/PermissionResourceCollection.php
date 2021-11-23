<?php

namespace Domain\Permission\Resources\Inventory;

use App\Infrastructure\Interfaces\BaseResourceCollection;

class PermissionResourceCollection extends BaseResourceCollection
{

    public $collects = 'Domain\Permission\Resources\Inventory\PermissionResource';

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
