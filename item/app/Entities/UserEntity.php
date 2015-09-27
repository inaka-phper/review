<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/22
 * Time: 16:30
 */

namespace App\Entities;


use App\Contracts\Entityable;
use App\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserEntity implements Entityable, Arrayable, Jsonable
{
    /* UserInterface */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * set a model on Entity
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->user = $model;

        return $this;
    }

    /**
     * get a Model
     * @return Model
     */
    public function getModel()
    {
        return $this->user;
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
     * all user list
     *
     * @return Collection
     */
    public function all()
    {
        return $this->user->all();
    }

    /**
     * paginate the user list
     *
     * @return Paginator
     */
    public function paginate()
    {
        return $this->user->paginate();
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

    /**
     * method if not found, calls into the model.
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array(array($this->getModel(), $method), $parameters);
    }

}