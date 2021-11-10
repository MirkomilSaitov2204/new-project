<?php

namespace App\Domain\User\Interfaces;


interface UserInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function storeUser(array $data): array;


    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateUser(array $data, int $id): bool;


    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id);
}
