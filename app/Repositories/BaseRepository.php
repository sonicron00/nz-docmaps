<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Abstract Class BaseRepository
 *
 * @category Abstract
 * @package  App\Repositories
 */
abstract class BaseRepository
{
    /*
    |--------------------------------------------------------------------------
    | Base Repository
    |--------------------------------------------------------------------------
    |
    | This repository is responsible for the base methods that all the extending
    | repositories use. The model that is being accessed by the extending repo
    | should be passed in via a parent call to the constructor.
    |
    */

    /**
     * The model being accessed, passed in via the constructor.
     *
     * @var Model $model
     */
    protected $model;

    /**
     * Repository constructor.
     *
     * @param Model $model - The model being accessed
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}
