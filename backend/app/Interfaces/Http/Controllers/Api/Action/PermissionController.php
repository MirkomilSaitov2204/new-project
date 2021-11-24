<?php

namespace Interfaces\Http\Controllers\Api\Action;

use Illuminate\Http\JsonResponse;
use Application\Request\Permission\StoreRequest;
use Application\Request\Permission\UpdateRequest;
use Domain\Permission\Services\PermissionService;
use Application\Request\Permission\FilterRequest;
use Domain\Permission\Resources\PermissionResource;
use Interfaces\Http\Controllers\Api\BaseController;
use Domain\Permission\Repositories\PermissionRepository;
use Domain\Permission\Resources\PermissionResourceCollection;

class PermissionController extends BaseController
{

    private $permissionRepositories;
    private $permissionServices;

    /**
     * @param PermissionRepository $permissionRepositories
     * @param PermissionService $permissionServices
     */
    public function __construct(PermissionRepository $permissionRepositories, PermissionService  $permissionServices)
    {
        $this->permissionRepositories   = $permissionRepositories;
        $this->permissionServices       = $permissionServices;

//        $this->middleware('permission:permissions', ['only' => ['index']]);
//        $this->middleware('permission:permission_create', ['only' => ['create, store']]);
//        $this->middleware('permission:permission_update', ['only' => ['update, edit']]);
//        $this->middleware('permission:permission_delete', ['only' => ['delete']]);
    }


    /**
     * @param FilterRequest $request
     * @return JsonResponse
     */
    public function index(FilterRequest $request): JsonResponse
    {
        try {
            $permissions = $this->permissionServices->permissions();
            $permissions = $this->permissionServices->filter($request, $permissions);
            $permissions = $permissions->paginate(self::PER_PAGE);

            return $this->send([
                'permissions' => new PermissionResourceCollection($permissions)
            ], __('app.controller.permission.index.success'),self::SUCCESS_CODE);

        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.permission.index.error'),self::UNPROCC_CODE);
        }
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        try {
            $permission =  $this->permissionRepositories->storePermission($request->validated());

            return $this->send([
                'permission' => new PermissionResource($permission)
            ],__('app.controller.permission.store.success'),self::SUCCESS_CODE);
        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.permission.store.error'),self::UNPROCC_CODE);
        }
    }

    /**
     * @param string $name
     * @return JsonResponse
     */
    public function show(string $name): JsonResponse
    {

    }

    /**
     * @param UpdateRequest $request
     * @param string $name
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, string $name): JsonResponse
    {
        try {
           $this->permissionRepositories->updatePermission($request->validated(), $name);
            return $this->send([],__('app.controller.permission.update.success'),self::SUCCESS_CODE);
        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.permission.update.error'),self::UNPROCC_CODE);
        }
    }

    /**
     * @param string $name
     * @return JsonResponse
     */
    public function destroy(string $name): JsonResponse
    {
        try {
            $this->permissionRepositories->deletePermission($name);
            return $this->send([],__('app.controller.permission.delete.success'),self::SUCCESS_CODE);
        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.permission.delete.error'),self::UNPROCC_CODE);
        }
    }
}
