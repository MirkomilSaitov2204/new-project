<?php

namespace Domain\Role\Resources\Inventory;

use Infrastructure\Interfaces\BaseResource;

class RoleResource extends BaseResource
{

    public function toArray($request)
    {
        return [
            self::ID         => $this->id,
            self::NAME       => $this->name,
        ];
    }
}
