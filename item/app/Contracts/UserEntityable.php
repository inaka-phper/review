<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/27
 * Time: 16:44
 */

namespace App\Contracts;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface UserEntityable
{
    /**
     * create new user.
     * @param array $values
     * @return UserEntityable
     */
    public function create(array $values);

    /**
     * find by user id.
     * @param $id
     * @return UserEntityable
     */
    public function find($id);

    /**
     * all user list
     * @return Collection
     */
    public function all();

    /**
     * paginate the user list
     * @return Paginator
     */
    public function paginate();

}