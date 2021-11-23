<?php

namespace Domain\User\Services;

use Application\Request\User\FilterRequest;
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

    public function filter(FilterRequest $request, $users)
    {
        $users = $request->email
            ? $users->where('email', 'LIKE', '%'.$request->email.'%')
            :$users;
        return $users;
    }

}
