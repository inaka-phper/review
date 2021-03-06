<?php

namespace App;

use App\Contracts\EntityInstanceable;
use App\Entities\UserEntity;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
    CanResetPasswordContract,
    EntityInstanceable
{
    use Authenticatable, Authorizable, CanResetPassword, EntityInstance;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['email', 'password', 'remember_token', 'created_at', 'updated_at'];

    public function children()
    {
        return $this->hasMany('App\Child');
    }

    /**
     * encoding to bcrypt from plain password.
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the Entity::class for the use model.
     * @return mixed
     */
    public function getEntityName()
    {
        return UserEntity::class;
    }
}
