<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2015/09/26
 * Time: 2:04
 */

namespace App\Contracts;


interface EntityInstanceable
{
    /**
     * Instance of the Entity that has included the Model.
     * @param array $attributes
     * @param bool|false $exists
     * @return Entityable
     */
    public function newInstance($attributes = [], $exists = false);

    /**
     * Get the Entity::class for the use model.
     * @return mixed
     */
    public function getEntityName();
}