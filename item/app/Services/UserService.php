<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/27
 * Time: 13:26
 */

namespace App\Services;


use App\Contracts\UserEntityable;
use App\Contracts\UserServiceable;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceable
{
    /**
     * @var UserEntityable
     */
    protected $entity;

    public function __construct(UserEntityable $entity)
    {
        $this->entity = $entity;
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
        return $this->entity->find($id);
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
}