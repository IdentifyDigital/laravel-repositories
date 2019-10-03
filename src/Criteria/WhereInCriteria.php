<?php

namespace IdentifyDigital\Repositories\Criteria;

use IdentifyDigital\Repositories\Repository;

class WhereInCriteria extends BaseCriteria
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var array
     */
    private $values;

    /**
     * WhereInCriteria constructor.
     *
     * @param string $field
     * @param array $values
     */
    public function __construct($field, $values = [])
    {
        $this->field = $field;
        $this->values = $values;
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
        return $model->whereIn($this->field, $this->values);
    }
}