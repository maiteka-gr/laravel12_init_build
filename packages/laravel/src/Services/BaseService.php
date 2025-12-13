<?php

namespace Laravel\Services;

/**
 * BaseService provides common service layer functionality.
 * Abstract base class for all service classes with CRUD operations.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
abstract class BaseService
{
    protected $repository;

    /**
     * Create a new BaseService instance.
     *
     * @param mixed $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all records from the repository.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->repository->all();
    }

    /**
     * Get a record by its ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new record.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update an existing record.
     *
     * @param int $id
     * @param array $data
     * @return bool|int
     */
    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete a record by its ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
