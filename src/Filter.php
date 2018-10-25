<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\FilterInterface;

class Filter implements FilterInterface
{
    protected $resource_type;
    protected $field;
    protected $value;

    /**
     * Initialize filter instance
     *
     * @param string $resource_type
     * @param string $field_name
     * @param string $value
     *
     * @return void
     */
    public function __construct(string $resource_type, $field_name, $value)
    {
        $this->resource_type = $resource_type;
        $this->field = $field_name;
        $this->value = $value;
    }

    /**
     * Retrieve filtered resource type
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return $this->resource_type;
    }

    /**
     * Retrieve filtered field name
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Retrieve filter value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
