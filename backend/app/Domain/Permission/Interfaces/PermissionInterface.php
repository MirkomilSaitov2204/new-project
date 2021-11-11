<?php

namespace Domain\Permission\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * @interface PermissionInterface
 * @package Domain\Permission\Interfaces
 *
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
interface PermissionInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function storePermission(array $data): Model;

    /**
     * @param array $data
     * @param string $name
     * @return bool
     */
    public function updatePermission(array $data, string $name): bool;

    /**
     * @param string $name
     * @return bool
     */
    public function deletePermission(string $name): bool;
}
