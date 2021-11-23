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
            self::CREATED_AT => $this->dateFormatters($this->created_at),
            self::UPDATED_AT => $this->dateFormatters($this->updated_at),
        ];
    }
}
