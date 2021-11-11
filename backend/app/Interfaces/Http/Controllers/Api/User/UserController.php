<?php

namespace Interfaces\Http\Controllers\Api\User;

use App\Domain\User\Resources\UserResourceCollection;
use Domain\User\Entities\User;
use App\Interfaces\Http\Controllers\Api\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::paginate(10);
        return $this->send([
            'users' => new UserResourceCollection($users)
        ]);
    }
}
