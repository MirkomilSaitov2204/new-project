<?php

namespace Interfaces\Http\Controllers\Api\Permission;

use App\Interfaces\Http\Controllers\Api\BaseController;

use Domain\Permission\Entities\Permission;
use Domain\Permission\Resources\PermissionResourceCollection;
use Domain\Permission\Services\PermissionService;
use Domain\Permission\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{

    private $permissionRepositories;
    private $permissionServices;

    public function __construct(PermissionRepository $permissionRepositories, PermissionService  $permissionServices)
    {
        $this->permissionRepositories   = $permissionRepositories;
        $this->permissionServices       = $permissionServices;

//        $this->middleware('permission:permissions', ['only' => ['index']]);
//        $this->middleware('permission:permission_create', ['only' => ['create, store']]);
//        $this->middleware('permission:permission_update', ['only' => ['update, edit']]);
//        $this->middleware('permission:permission_delete', ['only' => ['delete']]);
    }


    public function index()
    {
        $permissions = $this->permissionServices->permissions()->paginate(self::PER_PAGE);
        return $this->send([
            'users' => new PermissionResourceCollection($permissions)
        ]);
    }


    public function store(Request $request)
    {
       $permission =  $this->permissionRepositories->storePermission($request->all());

        return $this->send([
            'permission' => $permission
        ],'Success',200);
    }

    public function destroy($name)
    {
        $this->permissionRepositories->deletePermission($name);


        return $this->send([],
            'deleted',200
        );
    }

}
