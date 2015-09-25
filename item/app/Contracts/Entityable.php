<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/26
 * Time: 2:08
 */

namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;

interface Entityable
{
    /**
     * set a model on Entity
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model);

    /**
     * get a Model
     * @return Model
     */
    public function getModel();
}