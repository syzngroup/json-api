<?php

namespace Syzn\JsonApi\Tests\Assets;

use Syzn\JsonApi\Contracts\DataResourceInterface;

class ExampleDataSource implements DataResourceInterface
{
    /**
     * Retrieve source identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return rand(1, 1000);
    }
}
