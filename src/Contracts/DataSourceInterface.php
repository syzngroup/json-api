<?php

namespace Syzn\JsonApi\Contracts;

interface DataSourceInterface
{
    /**
     * Retrieve source identifier
     *
     * @return string
     */
    public function getIdentifier();
}
