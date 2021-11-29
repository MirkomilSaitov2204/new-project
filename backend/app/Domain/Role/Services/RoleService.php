<?php


namespace Domain\Role\Services;

use Domain\Role\Entities\Role;
use Application\Request\Role\FilterRequest;

/**
 * Class RoleService
 * @package Domain\Role\Services
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 *
 * @copyright 2021.11.26
 */
class RoleService
{
    protected $roles;

    /**
     * RoleService constructor.
     * @param Role $roles
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return Role
     */
    public function roles(): Role
    {
        return $this->roles;
    }


    /**
     * @param string $data
     * @return object
     */
    public function getRoleByName(string $data): object
    {
        return $this->roles()->with('permissions')->where('name', $data)->first();
    }


    /**
     * @param FilterRequest $request
     * @param $roles
     * @return object
     */
    public function filter(FilterRequest $request, $roles): object
    {
        $roles = $request->name
            ? $roles->where('name', 'LIKE', '%'.$request->name.'%')
            :$roles;

        $roles = $request->is_active
            ? $roles->where('is_active', $request->is_active)
            :$roles;

        return $roles;
    }
}
