<?php

namespace Domain\Role\Resources\Inventory;

use Infrastructure\Interfaces\BaseResourceCollection;

/**
 * @class RoleResourceCollection
 * @package  Domain\Role\Resources\Inventory
 * @extends Infrastructure\Interfaces\BaseResourceCollection
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 * @copyright 2021.11.27
 */
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
