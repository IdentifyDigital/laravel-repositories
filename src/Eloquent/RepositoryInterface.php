<?php

namespace IdentifyDigital\Repositories;

use IdentifyDigital\Repositories\Criteria\BaseCriteria;
use IdentifyDigital\Repositories\Exceptions\RepositoriesException;
use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    /**
     * Resets the criteria scope for working on fresh instances.
     *
     * @return $this
     * @throws RepositoriesException
     */
    public function resetScope();

        /**
     * Skips any criteria in the collection.
     *
     * @param bool $status
     * @return $this|mixed
     */
    public function skipCriteria($status = true);

    /**
     * Pushes the given Criteria object to the criteria collection.
     *
     * @param BaseCriteria $criteria
     * @return $this|mixed
     */
    public function pushCriteria(BaseCriteria $criteria);

    /**
     * Directly applies the criteria to the repo instance for one line implementations.
     *
     * @param BaseCriteria $criteria
     * @return $this|mixed
     */
    public function getByCriteria(BaseCriteria $criteria);

    /**
     * A given set of standardized formats for each field in the repository when creating/updating.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function formatting($key, $value);

    /**
     * Applies the current repos formats to each value in an array.
     *
     * @param array $data
     * @return array
     */
    public function applyFormats(array $data);

    /**
     * Returns the query builder from the current repository model.
     *
     * @return Builder
     */
    public function builder();

    /**
     * Returns all rows for the current Model.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = array('*'));

    /**
     * Returns all rows with the current criteria as paginated results.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate($perPage = 15, $columns = array('*'));

    /**
     * Returns a single row for the current Model by ID.
     *
     * @param $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, $columns = array('*'));

    /**
     * Returns a single row for the current Model by the given criteria.
     * If none is found, it will create one with the specified data.
     *
     * @param array $where
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOrCreate(array $where, array $data);

    /**
     * Returns a single row for the given criteria.
     *
     * @param $field
     * @param $operator
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByField($field, $operator, $value, $columns = array('*'));

    /**
     * Returns rows that match the criteria.
     *
     * @param array $where
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhere(array $where, $columns = array('*'));

    /**
     * Returns rows where the given field are LIKE the value specified.
     *
     * @param $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereLike($field, $value, $columns = array('*'));

    /**
     * Returns rows where the given field contains one of the specified values.
     *
     * @param $field
     * @param array $values
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereIn($field, array $values, $columns = array('*'));

    /**
     * Returns rows where the given field does not contain one of the specified values.

     * @param $field
     * @param array $values
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findWhereNotIn($field, array $values, $columns = array('*'));

    /**
     * Creates a new model with the given data.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data);

    /**
     * Updates the given model by ID, with the specified data.
     *
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data);

    /**
     * Updates all records with the given data that match the search criteria.
     *
     * @param array $where
     * @param array $data
     * @return int
     */
    public function updateWhere(array $where, array $data);

    /**
     * Updates all records with the given data that have values in the given array.
     *
     * @param $field
     * @param array $values
     * @param array $data
     * @return int
     */
    public function updateWhereIn($field, array $values, array $data);

    /**
     * Updates all records with the given data that have does not have values in the given array.
     *
     * @param $field
     * @param array $values
     * @param array $data
     * @return int
     */
    public function updateWhereNotIn($field, array $values, array $data);

    /**
     * Either updates or creates the given data, depending on whether
     * the $where data matches a row.
     *
     * @param array $where
     * @param array $data
     * @return return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $where, array $data);

    /**
     * Deletes a record by the given ID.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Deletes multiple records which match the given criteria.
     *
     * @param array $where
     * @return int
     */
    public function deleteWhere(array $where);

    /**
     * Deletes multiple records which fields match at least one of the given values.
     *
     * @param $field
     * @param array $values
     * @return int
     */
    public function deleteWhereIn($field, array $values);

    /**
     * Deletes multiple records which fields do not match at least one of the given values.
     *
     * @param $field
     * @param array $values
     * @return int
     */
    public function deleteWhereNotIn($field, array $values);
}
