<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/27
 * Time: 13:26
 */

namespace App\Contracts;


use App\Entities\UserEntity;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceable
{
    /**
     * get UserEntityable
     * @return UserEntityable
     */
    public function getEntity();

    /**
     * add user
     * @param $values
     * @return UserEntity
     */
    public function addUser(array $values);

    /**
     * add users
     * @param $values <array>
     * @return boolean
     */
    public function addUsers(array $values);

    /**
     * find by users id
     * @param integer $id
     * @return UserEntity
     */
    public function find($id);

    /**
     * all users
     * @return Collection
     */
    public function all();

    /**
     * all users
     * @return Collection
     */
    public function paginate();
}