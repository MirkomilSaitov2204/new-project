<?php

namespace App\Infrastructure\Interfaces;

interface Items
{
    // unique id
    const ID = 'id';

    //name
    const NAME = 'name';

    //emails
    const EMAIL      = 'email';

    //active
    const IS_ACTIVE = 'is_active';

    // DATE created_at
    const CREATED_AT = 'created_at';

    // DATE updated_at
    const UPDATED_AT = 'updated_at';

    // this post created by whom
    const CREATED_BY = 'created_by';

    // this post updated by whom
    const UPDATED_BY = 'updated_by';
}
