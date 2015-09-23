<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/22
 * Time: 16:30
 */

namespace App\Entities;


use App\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class UserEntity implements Arrayable, Jsonable
{
    /* UserInterface */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    public function create(array $value)
    {
        $this->user = $this->user->newInstance();
        $this->user->fill($value);

        return $this->user->save();
    }

    /**
     * ユーザーIDからユーザーデータを取得する
     *
     * @param $id
     * @return $this
     */
    public function find($id)
    {
        $this->user = $this->user->findOrFail($id);

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->user->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return $this->user->toJson();
    }

}