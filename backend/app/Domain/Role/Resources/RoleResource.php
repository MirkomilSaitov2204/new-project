<?php

namespace Domain\Role\Resources;

use Infrastructure\Interfaces\BaseResource;
use Domain\Permission\Resources\Inventory\PermissionResourceCollection;

/**
 * @class RoleResource
 * @package   Domain\Role\Resources
 * @extends Infrastructure\Interfaces\BaseResource;
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
