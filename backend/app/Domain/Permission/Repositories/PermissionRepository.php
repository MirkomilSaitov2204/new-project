<?php

namespace Domain\Permission\Repositories;

use Illuminate\Database\Eloquent\Model;
use Domain\Permission\Services\PermissionService;
use Domain\Permission\Interfaces\PermissionInterface;

/**
 * @namespace Domain\Action\Repositories
 * @model Action
 * @class PermissionRepository
 * @param $permissionServices
 *
 * @author  Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
class PermissionRepository implements PermissionInterface
{
    /**
     * @var $permissionServices
     */
    protected $permissionServices;

    /**
     * @param PermissionService $permissionServices
     */
    public function __construct(PermissionService $permissionServices)
    {
        $this->permissionServices = $permissionServices;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function storePermission(array $data): Model
    {
        try {
            isset($data['is_active']) ?? $data['is_active'] = false;
            $permissions = $this->permissionServices->permissions()->create($data);
            return $permissions;
        } catch (\Throwable $exception) {
            return $exception;
        }
    }


    /**
     * @param array $data
     * @param string $name
     * @return bool
     */
    public function updatePermission(array $data, string $name): bool
    {
        try {
            $permission = $this->permissionServices->permissions()->where('name', $name)->first();
            if ($permission) {
                isset($data['is_active']) ?? $data['is_active'] = false;
                return $permission->update($data);
            }
        } catch (\Throwable $exception) {
            return $exception;
        }
    }


    /**
     * @param string $name
     * @return bool
     */
    public function deletePermission(string $name): bool
    {
        try {
            $permission = $this->permissionServices->permissions()->where('name', $name)->first();
            if ($permission) {

                $permission = $permission->delete();
                return $permission;
            }
        } catch (\Throwable $exception) {
            dd($exception);
        }
    }

}
