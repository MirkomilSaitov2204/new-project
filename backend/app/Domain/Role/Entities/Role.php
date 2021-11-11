<?php

namespace App\Domain\Role\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Role
 * @package App\Domain\Role\Entities
 * @package  \Spatie\Permission\Models\Role
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

    /**
     * @return $value
     * @method capitalize Name
     */
//    public function getNameAttribute($value)
//    {
//        return ucfirst($value);
//    }


    /**
     * Set the name.
     *
     * @param  string  $value
     * @return void
     */
//    public function setNameAttribute($value)
//    {
//        $this->attributes['name'] = ucfirst($value);
//    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActiveCount($query)
    {
        return $query->where('is_active', true)->where('name' ,'!=', 'superadmin')->count();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeInactiveCount($query)
    {
        return $query->where('is_active', false)->where('name' ,'!=', 'superadmin')->count();
    }
}
