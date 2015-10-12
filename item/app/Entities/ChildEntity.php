<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/10/12
 * Time: 14:33
 */

namespace App\Entities;


use App\Child;
use App\Contracts\Entityable;
use App\Contracts\ChildEntityable;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ChildEntity implements ChildEntityable, Entityable, Arrayable, Jsonable
{
    /* ChildInterface */
    protected $child;

    public function __construct(Child $child)
    {
        $this->child = $child;
    }

    /**
     * set a model on Entity
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->child = $model;

        return $this;
    }

    /**
     * get a Model
     * @return Model
     */
    public function getModel()
    {
        return $this->child;
    }

    public function create(array $value)
    {
        $this->child = $this->child->newInstance();
        $this->child->fill($value);

        return $this->child->save();
    }

    /**
     * get child from id.
     *
     * @param $id
     * @return $this
     */
    public function find($id)
    {
        $this->child = $this->child->findOrFail($id);

        return $this;
    }

    /**
     * all children list
     *
     * @return Collection
     */
    public function all()
    {
        return $this->child->all();
    }

    /**
     * paginate the children list
     *
     * @return Paginator
     */
    public function paginate()
    {
        return $this->child->paginate();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->child->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return $this->child->toJson();
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