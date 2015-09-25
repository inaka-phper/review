<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/26
 * Time: 1:15
 */

namespace App;


trait EntityInstance
{
    /**
     * @param array $attributes
     * @param bool|false $exists
     * @return Entityable
     */
    public function newInstance($attributes = [], $exists = false)
    {
        $model = new static((array)$attributes);

        $model->exists = $exists;

        $class = $this->getEntityName();

        $entity = new $class($model);

        return $entity;
    }

}