<?php

namespace Domain\Role\Resources;

use Domain\Permission\Resources\Inventory\PermissionResourceCollection;
use Infrastructure\Interfaces\BaseResource;

class RoleResource extends BaseResource
{

    public function toArray($request)
    {
        return [
            self::ID          => $this->id,
            self::NAME        => $this->name,
            self::DESCRIPTION => $this->description,
            self::IS_ACTIVE   => $this->is_active ? true : false,

            'permissions'      => new PermissionResourceCollection($this->permissions),

            self::CREATED_AT   => $this->dateFormatters($this->created_at),
            self::UPDATED_AT   => $this->dateFormatters($this->updated_at),
        ];
    }
}
