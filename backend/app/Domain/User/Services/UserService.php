<?php

namespace Domain\User\Services;

use Domain\User\Entities\User;

class UserService
{
    protected $users;

    /**
     * RoleService constructor.
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * @return User
     */
    public function users(): User
    {
        return $this->users;
    }

}
