<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Search a model
     *
     * @param string $searchString
     *
     * @return Collection
     */
    public function search(string $searchString)
    {
        return $this->model->search($searchString)->get();
    }

    /**
     * Return all rows
     *
     * @return Collection
     *
     * @throws ModelNotFoundException
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a model by its primary key or throw an exception.
     * @param mixed $id
     * @return mixed
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find a model by its primary key or throw an exception.
     * @param mixed $id
     * @return mixed
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find a model by its primary key or throw an exception.
     * @param mixed $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = array())
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * Find a model with relationships by its primary key or throw an exception.
     *
     * @param array|string $relations
     * @param int $id
     * @return mixed
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Database\Eloquent\RelationNotFoundException
     */
    public function findWithRelations($relations, $id)
    {
        return $this->model->with($relations)->findOrFail($id);
    }

    /**
     * Save a new model and return the instance.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a model in the database.
     *
     * @param array $attributes
     * @param int $id
     * @return mixed
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(array $attributes, $id)
    {
        $model = $this->model->withoutGlobalScopes()->findOrFail($id);
        $model->update($attributes);

        return $model;
    }

    /**
     * Destroy the models for given ids.
     *
     * @param array|int $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * Add a basic where clause to the query.
     *
     * @param  \Closure|string|array  $column
     * @param  mixed  $value
     * @param  mixed  $operator
     * @param  string  $boolean
     * @return $this
     */
    public function where($column, $value, $operator = '=', $boolean = 'and')
    {
        return $this->model->where($column, $operator, $value, $boolean);
    }

    /**
     * Find a model with relationship counts by its primary key or throw an exception.
     *
     * @param array $relations
     * @param $id
     * @return mixed
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Database\Eloquent\RelationNotFoundException
     */
    public function findWithCounts(array $relations, $id)
    {
        return $this->model->withCount($relations)->findOrFail($id);
    }

    /**
     * Begin querying the model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model->query();
    }

}
