<?php

namespace App;

use App\Contracts\EntityInstanceable;
use App\Entities\ChildEntity;
use Illuminate\Database\Eloquent\Model;

class Child extends Model implements EntityInstanceable
{
    use EntityInstance;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'gender', 'birth', 'plan'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    /**
     * Get the Entity::class for the use model.
     * @return mixed
     */
    public function getEntityName()
    {
        return ChildEntity::class;
    }
}
