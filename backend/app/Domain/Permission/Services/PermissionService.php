<?php

namespace Domain\Permission\Services;

use Application\Request\Permission\FilterRequest;
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
    public function permissionParent(): Permission
    {
        return $this->permissions()->where('parent_id', 0)->get();
    }

    /**
     * @param string $data
     * @return object
     */
    public function getPermissionByName(string $name): object
    {
        return $this->permissions()->where('name', $name)->first();
    }

    /**
     * @param FilterRequest $request
     * @param $permissions
     * @return object
     */
    public function filter(FilterRequest $request, $permissions): object
    {
        $permissions= $request->name
            ? $permissions->where('name','LIKE', '%'.$request->name.'%')
            : $permissions;


        $permissions= $request->is_active
            ? $permissions->where('is_active',$request->is_active)
            : $permissions;


        $permissions= $request->parent_id
            ? $permissions->where('parent_id',$request->parent_id)
            : $permissions;

        return $permissions;
    }
}
