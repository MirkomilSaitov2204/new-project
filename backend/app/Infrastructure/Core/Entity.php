<?php

namespace Infrastructure\Core;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 *
 * Global Entities Model
 * @author Mirkomil Saitov <mirkomilmirabdullevich@gmail.com>
 */
class Entity extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];
}
