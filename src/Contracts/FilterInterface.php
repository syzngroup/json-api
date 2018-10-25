<?php

namespace Syzn\JsonApi\Contracts;

interface FilterInterface
{
    /**
     * Retrieve filtered resource type
     *
     * @return string
     */
    public function getResourceType(): string;

    /**
     * Retrieve filtered field name
     *
     * @return string
     */
    public function getField(): string;

   /**
     * Retrieve filter value
     *
     * @return mixed
     */
    public function getValue();
}
