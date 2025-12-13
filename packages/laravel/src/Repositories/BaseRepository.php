<?php

namespace Laravel\Repositories;

/**
 * BaseRepository provides common database operations.
 * Abstract base class for all repository classes with CRUD functionality.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
abstract class BaseRepository
{
    protected $model;  

    /**
     * Create a new BaseRepository instance.
     * Initializes the model property with the result of getModel().
     */
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    /**
     * Get the model instance for this repository.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function getModel();

    /**
     * Get all records from the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a record by its ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new record in the database.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a record by its ID.
     *
     * @param int $id
     * @param array $data
     * @return bool|int
     */
    public function update($id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * Delete a record by its ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find a record by a specific field and value.
     *
     * @param string $field
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    function findByField( $field, $value ) {
        return $this->model->where( $field, '=', $value )->first();
    }
}
