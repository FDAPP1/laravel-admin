<?php

namespace Encore\Admin\Grid\Filter;

use Illuminate\Support\Arr;

class OrWhereIn extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'orWhereIn';

    /**
     * Get condition of this filter.
     *
     * @param array $inputs
     *
     * @return mixed
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if (is_null($value)) {
            return;
        }

        $this->value = (array) $value;

        return $this->buildCondition($this->column, $this->value);
    }
}
