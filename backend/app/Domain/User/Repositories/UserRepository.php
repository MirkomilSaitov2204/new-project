<?php

namespace Domain\User\Repositories;

use Domain\User\Services\UserService;
use App\Domain\User\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserInterface
{

    protected  $userServices;

    public function __construct(UserService $userServices)
    {
        $this->userServices= $userServices;
    }

    /**
     * @param array $data
     * @return array
     */
    public function storeUser(array $data): Model
    {
        try {

        }catch (\Throwable $exception){
            dd($exception);
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array
     */
    public function updateUser(array $data, $id): bool
    {
        try {
        }catch (\Throwable $exception){
            dd($exception);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id): Model
    {
        try {

        }catch (\Throwable $exception){
            dd($exception);
        }
    }
}
