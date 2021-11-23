<?php

namespace Interfaces\Http\Controllers\Api\User;

use Application\Request\User\FilterRequest;
use Domain\Permission\Resources\PermissionResourceCollection;
use Domain\User\Entities\User;
use App\Interfaces\Http\Controllers\Api\BaseController;
use Domain\User\Repositories\UserRepository;
use Domain\User\Resources\UserResourceCollection;
use Domain\User\Services\UserService;
use Illuminate\Http\JsonResponse;

/**
 * @package Interfaces\Http\Controllers\Api\User;
 * @class UserController
 * @method __constructor
 * @method indexes
 * @method inventories
 * @method stores
 * @method shows
 * @method updates
 * @method deletes
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @copyright 2021.11.23
 */
class UserController extends BaseController
{
    private $userServices;
    private $userRepositories;

    /**
     * @param UserService $userServices
     * @param UserRepository $userRepositories
     */
    public function __construct(UserService $userServices, UserRepository $userRepositories)
    {
        $this->userRepositories = $userRepositories;
        $this->userServices     = $userServices;
    }

    /**
     * @param FilterRequest $request
     * @return JsonResponse
     */
    public function index(FilterRequest $request): JsonResponse
    {
        try {
            $users = $this->userServices->users();
            $users = $this->userServices->filter($request, $users);
            $users = $users->paginate(self::PER_PAGE);

            return $this->send([
                'users' => new UserResourceCollection($users)
            ], __('app.controller.user.index.success'),self::SUCCESS_CODE);

        }catch (\JsonException $exception){
            return $this->send(['users' => $exception], __('app.controller.user.index.error'),self::UNPROCC_CODE);
        }
    }


    public function store()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
