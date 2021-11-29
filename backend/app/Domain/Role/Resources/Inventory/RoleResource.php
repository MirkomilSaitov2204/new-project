<?php

namespace Domain\Role\Resources\Inventory;

use Infrastructure\Interfaces\BaseResource;

/**
 * @class RoleResourceCollection
 * @package  Domain\Role\Resources\Inventory
 * @extends Infrastructure\Interfaces\BaseResource
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 * @copyright 2021.11.27
 */
class RoleResource extends BaseResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            self::ID         => $this->id,
            self::NAME       => $this->name,
        ];
    }
}
