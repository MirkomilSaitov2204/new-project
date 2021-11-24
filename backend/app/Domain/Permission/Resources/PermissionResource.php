<?php

namespace Domain\Permission\Resources;

use Infrastructure\Interfaces\BaseResource;

class PermissionResource extends BaseResource
{

    public function toArray($request)
    {
        return [
            self::ID         => $this->id,
            self::NAME       => $this->name,
            self::DESCRIPTION=> $this->description,
            self::IS_ACTIVE  => $this->is_active ? true : false,

            'parent_id'      => $this->parent_id,
            'children'       => new \Domain\Permission\Resources\Inventory\PermissionResourceCollection($this->children),

            self::CREATED_AT => $this->dateFormatters($this->created_at),
            self::UPDATED_AT => $this->dateFormatters($this->updated_at),
        ];
    }
}
