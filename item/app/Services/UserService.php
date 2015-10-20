<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/27
 * Time: 13:26
 */

namespace App\Services;


use App\Contracts\ChildEntityable;
use App\Contracts\UserEntityable;
use App\Contracts\UserServiceable;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceable
{
    /**
     * @var UserEntityable
     */
    protected $entity;

    /**
     * @var ChildEntityable
     */
    protected $child;

    public function __construct(UserEntityable $entity, ChildEntityable $child)
    {
        $this->entity = $entity;
        $this->child = $child;
    }

    /**
     * get UserEntityable
     * @return UserEntityable
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * get ChildEntityable
     * @return ChildEntityable
     */
    public function getChildEntity()
    {
        return $this->child;
    }

    /**
     * add user
     * @param $values
     * @return UserEntityable
     */
    public function addUser(array $values)
    {
        return $this->entity->create($values);
    }

    /**
     * add users
     * @param $values <array>
     * @return boolean
     */
    public function addUsers(array $values)
    {
        foreach ($values as $value) {
            if (!$this->addUser($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * find by users id
     * @param integer $id
     * @return UserEntityable
     */
    public function find($id)
    {
        return $this->entity = $this->entity->find($id);
    }

    /**
     * all users
     * @return Collection
     */
    public function all()
    {
        return $this->entity->all();
    }

    /**
     * all users
     * @return Collection
     */
    public function paginate()
    {
        return $this->entity->paginate();
    }

    /**
     * add child on user.
     * @param array $values
     * @return ChildEntityable
     */
    public function addChild(array $values)
    {
        return $this->child->create($this->getEntity(), $values);
    }

    /**
     * delete child for user.
     * @param $id
     * @return Collection
     */
    public function deleteChild($id)
    {
        return $this->child->destroy($id);
    }

    /**
     * get child from user.
     * @return ChildEntityable
     */
    public function getChild($id)
    {
        $this->child = $this->entity->children->first(function ($key, ChildEntityable $child) use ($id) {
            return $child->getModel()->id == $id;
        });
        return $this->child;
    }

    /**
     * get children from user.
     * @return Collection
     */
    public function getChildren()
    {
        return $this->entity->children;
    }
}