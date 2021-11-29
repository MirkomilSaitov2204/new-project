<?php

namespace Domain\Role\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Role
 * @package App\Domain\Role\Entities
 * @package  \Spatie\Action\Models\Role
 * @package \Spatie\HasTransactions
 * @package SoftDeletes
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 *
 * @property integer $id
 * @property string $name
 * @property string $guard_name
 * @property json $description
 *
 * @copyright 2021.11.24
 */
class Role extends \Spatie\Permission\Models\Role
{
    use HasTranslations;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'guard_name', 'description', 'is_active'];

    /**
     * @var string[]
     */
    public $translatable = ['description'];
}
