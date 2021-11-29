<?php


namespace Domain\Role\Repositories;


use Domain\Role\Interfaces\RoleInterface;
use Domain\Role\Services\RoleService;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleRepository
 * @package Domain\Role\Repositories
 * @implements RoleInterface
 * @service RoleService
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@mgial.com>
 * @copyright 2021.11.26
 */
class RoleRepository implements RoleInterface
{

    /**
     * @var RoleService
     */
    protected $roleServices;

    /**
     * RoleRepository constructor.
     * @param RoleService $roleServices
     */
    public function __construct(RoleService $roleServices)
    {
        $this->roleServices = $roleServices;
    }


    /**
     * @method Store Data
     * @param  $data
     * @return mixed
     */
    public function storeRole(array $data): Model
    {
        try {
            isset($data['is_active']) ? $data['is_active'] :  $data['is_active'] =false;

            $role = $this->roleServices->roles()->create($data);
            if(isset($data['permissions'])){
                $role = $role->syncPermissions($data['permissions']);
            }
            return $role;
        }catch (\Exception  $exception){
            throw new \HttpException(500, $exception->getMessage());
        }
    }

    /**
     * @method Update Data
     * @param  $name
     * @param  $data
     * @return mixed
     */
    public function updateRole(array $data, string $name): bool
    {
        try {
            $role = $this->roleServices->roles()->where('name', $name)->first();
            if($role){
                isset($data['is_active']) ? $data['is_active'] :  $data['is_active'] =false;

                if(isset($data['permissions'])){
                    $role->syncPermissions($data['permissions']);
                }
                return $role->update($data);
            }
        }catch (\Exception  $exception){
            throw new \HttpException(500, $exception->getMessage());
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function deleteRole(string $name): Model
    {
        try {
            $role = $this->roleServices->roles()->where('name', $name)->first();
            if($role){
                $role = $role->delete();
                return $role;
            }
        }catch (\Exception  $exception){
            throw new \HttpException(500, $exception->getMessage());
        }
    }

}
