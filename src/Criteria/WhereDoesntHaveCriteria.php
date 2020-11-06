<?php

namespace IdentifyDigital\Repositories\Criteria;

use IdentifyDigital\Repositories\Repository;

class WhereDoesntHaveCriteria extends BaseCriteria
{
    /**
     * @var string
     */
    private $relation;

    /**
     * @var array
     */
    private $callback;

    /**
     * WhereHasCriteria constructor.
     *
     * @param $relation
     * @param array $callback
     */
    public function __construct($relation, $callback = [])
    {
        $this->relation = $relation;
        $this->callback = $callback;
    }

    /**
     * Applies the criteria.
     *
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public  function apply($model, Repository $repository)
    {
        return $model->whereDoesntHave($this->relation, $this->callback);
    }
}
