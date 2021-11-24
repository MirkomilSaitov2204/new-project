<?php

namespace Interfaces\Http\Controllers\Api\Action;

use App\Domain\Role\Repositories\RoleRepository;
use App\Domain\Role\Services\RoleService;
use Application\Request\Role\FilterRequest;
use Illuminate\Http\JsonResponse;
use Domain\Role\Resources\RoleResource;
use Interfaces\Http\Controllers\Api\BaseController;
use Domain\Role\Resources\RoleResourceCollection;

class RoleController extends BaseController
{

    private $roleRepositories;
    private $roleServices;

    /**
     * @param RoleRepository $roleRepositories
     * @param RoleService $roleServices
     */
    public function __construct(RoleRepository $roleRepositories, RoleService $roleServices)
    {
        $this->roleServices       = $roleServices;
        $this->roleRepositories   = $roleRepositories;

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
            $roles = $this->roleServices->roles();
            $roles = $this->roleServices->filter($request, $roles);
            $roles = $roles->paginate(self::PER_PAGE);

            return $this->send([
                'roles' => new RoleResourceCollection($roles)
            ], __('app.controller.role.index.success'),self::SUCCESS_CODE);

        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.role.index.error'),self::UNPROCC_CODE);
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
                'permission' => new RoleResource($permission)
            ],__('app.controller.permission.store.success'),self::SUCCESS_CODE);
        }catch (\JsonException $exception){
            return $this->error($exception, __('app.controller.permission.store.error'),self::UNPROCC_CODE);
        }
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
