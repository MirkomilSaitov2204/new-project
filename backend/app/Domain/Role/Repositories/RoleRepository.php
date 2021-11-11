<?php


namespace App\Domain\Role\Repositories;


use App\Domain\Core\GlobalInterface;
use App\Domain\Role\Interfaces\RoleInterface;
use App\Domain\Role\Services\RoleService;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleRepository
 * @package App\Domain\Role\Repositories
 * @implements RoleInterface
 * @implements GlobalInterFace
 * @service RoleService
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@mgial.com>
 *
 */
class RoleRepository implements RoleInterface, GlobalInterface
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
    public function storeRole(array $data)
    {
        try {
            isset($data['is_active']) ? $data['is_active'] :  $data['is_active'] =false;

            $role = $this->roleServices->roles()->create($data);
            if(isset($data['permissions'])){
                $role = $role->syncPermissions($data['permissions']);
            }
            return $role;
        }catch (\Throwable $exception){
            dd($exception);
        }
    }

    /**
     * @method Update Data
     * @param  $name
     * @param  $data
     * @return mixed
     */
    public function updateRole(array $data, $name): bool
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
        }catch (\Throwable $exception){
            dd($exception);
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function deleteRole($name)
    {
        try {
            $role = $this->roleServices->roles()->where('name', $name)->first();
            if($role){
                $role = $role->delete();
                return $role;
            }
        }catch (\Throwable $exception){
            dd($exception);
        }
    }

}
