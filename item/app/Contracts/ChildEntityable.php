<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/10/12
 * Time: 14:40
 */

namespace App\Contracts;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface ChildEntityable
{
    /**
     * create new children.
     * @param array $values
     * @return ChildEntityable
     */
    public function create(array $values);

    /**
     * find by children id.
     * @param $id
     * @return ChildEntityable
     */
    public function find($id);

    /**
     * all children list
     * @return Collection
     */
    public function all();

    /**
     * paginate the children list
     * @return Paginator
     */
    public function paginate();

}