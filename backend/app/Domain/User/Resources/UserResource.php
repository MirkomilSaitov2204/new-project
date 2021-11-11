<?php

namespace App\Domain\User\Resources;

use Infrastructure\Interfaces\BaseResource;

class UserResource extends BaseResource
{

    public function toArray($request)
    {
        return [
            self::ID         => $this->id,
            self::NAME       => $this->name,
            self::EMAIL      => $this->email,
            self::CREATED_AT => $this->created_at,
            self::UPDATED_AT => $this->updated_at,
        ];
    }
}
