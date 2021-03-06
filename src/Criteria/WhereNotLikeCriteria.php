<?php

namespace IdentifyDigital\Repositories\Criteria;

use IdentifyDigital\Repositories\Repository;

class WhereNotLikeCriteria extends BaseCriteria
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $value;

    /**
     * WhereNotLikeCriteria constructor.
     *
     * @param string $field
     * @param string $value
     */
    public function __construct($field, $value = '')
    {
        $this->field = $field;
        $this->value = $value;
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
        return $model->where($this->field, 'NOT LIKE', "%{$this->value}%");
    }
}