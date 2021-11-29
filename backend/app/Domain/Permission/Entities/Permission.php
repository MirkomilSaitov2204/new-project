<?php

namespace Domain\Permission\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class User
 * @package Domain\User\Entities
 * @package \Spatie\HasTransactions
 * @package SoftDeletes
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 *
 * @property int $id
 * @property int $parent_id
 * @property int $name
 * @property json $description
 * @property static $guard_name
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    use SoftDeletes, HasTranslations;


    protected $guard_name = 'api';
    /**
     * @var array $guarded
     */
    protected $guarded = [];

    /**
     * @var string $table name
     */
    protected $table = 'permissions';

    /**
     * @var string[] $translatable
     */
    public $translatable = ['description'];

    /**
     * @return BelongsTo get parent
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * @return HasMany get children
     */
    public function children(): HasMany
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }
}
