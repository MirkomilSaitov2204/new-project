<?php
namespace Domain\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Infrastructure\Database\Factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Infrastructure\Core\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @class User
 * @package Domain\User\Entities
 * @extends Infrastructure\Core\Authenticatable
 *
 * @property  integer $id
 * @property  string $username
 * @property  string $email
 * @property  string $password
 * @property  timestamp email_verified_at
 * @property  timestamp $create_at
 * @property  timestamp $updated_at
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes, HasFactory;

    protected $guard_name = 'web';
    public $table  = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
