<?php

namespace Domain\Permission\Services;

use Domain\Permission\Entities\Permission;


/**
 * Class PermissionService
 * @package Domain\Permission\Services
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +9989032485863
 */
class PermissionService
{
    protected $permissions;

    /**
     * Constructor for initializing $permissions
     * User $permission
     */
    public function __construct(Permission $permissions)
    {
        return $this->permissions = $permissions;
    }

    /**
     * Get All permissions
     */
    public function permissions(): Permission
    {
        return $this->permissions;
    }


    /**
     * @return mixed
     */
    public function permissionParent()
    {
        return $this->permissions()->where('parent_id', 0)->get();
    }

    /**
     * @param string $data
     * @return object
     */
    public function getPermissionByName(string $data): object
    {
        return $this->permissions()->where('name', $data)->first();
    }
}
