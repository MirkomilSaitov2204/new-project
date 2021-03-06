<?php

namespace Domain\Permission\Resources\Inventory;

use Infrastructure\Interfaces\BaseResource;

class PermissionResource extends BaseResource
{

    public function toArray($request)
    {
        return [
            self::ID         => $this->id,
            self::NAME       => $this->name,
        ];
    }
}
