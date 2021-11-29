<?php

namespace Domain\User\Repositories;

use Domain\User\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use Domain\User\Interfaces\UserInterface;

/**
 * Class UserRepository
 * @interface Domain\User\Interfaces\UserInterface
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @copyright 2021.11.29
 */
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
            $user = $this->userServices->users()->create($data);

            if(isset($data['data']) && isset($data['data']['roles'])){
                $user = $user->syncRoles($data['data']['roles']);
            }
            return  $user;

        }catch (\Exception  $exception){
            throw new \HttpException(self::SERVER_ERROR, $exception->getMessage());
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
        }catch (\Exception  $exception){
            throw new \HttpException(self::SERVER_ERROR, $exception->getMessage());
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
