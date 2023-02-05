<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    public function createMany(array $arrayAttributes);

    /**
     * Update
     *
     * @param $model
     * @param array $attributes
     *
     * @return mixed
     */
    public function update($model, array $attributes);

    /**
     * Delete
     * @param $model
     * @return mixed
     */
    public function delete($model);

    /**
     * Get model.
     * @return string
     */
    public function getModel();

    public function originalModel();

    public function getFirstBy($key, $value, array $with = []);

    public function getManyBy($key, $value, array $with = []);

    public function getManyInArray($key, $array, array $with = []);

    public function make(array $with = []);

    public function findOrFail($id);
}
