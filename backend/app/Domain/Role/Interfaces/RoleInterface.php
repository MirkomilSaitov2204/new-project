<?php


namespace App\Domain\Role\Interfaces;


/**
 * Interface RoleInterface
 * @package App\Domain\Role\Interfaces
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 */
interface RoleInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function storeRole(array $data);

    /**
     * @param array $data
     * @param $name
     * @return array
     */
    public function updateRole(array $data, $name): bool;

    /**
     * @param $name
     * @return mixed
     */
    public function deleteRole($name);
}
