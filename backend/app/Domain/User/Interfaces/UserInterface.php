<?php

namespace Domain\User\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Infrastructure\Core\BaseInterface;

/**
 * @interface UserInterface
 * @package Domain\User\Interfaces
 *
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
interface UserInterface extends BaseInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function storeUser(array $data): Model;


    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateUser(array $data, int $id): bool;


    /**
     * @param int $id
     * @return Model
     */
    public function deleteUser(int $id): Model;
}
