<?php

namespace Syzn\JsonApi\Tests\Assets;

use Syzn\JsonApi\Contracts\DataSourceInterface;

class ExampleDataSource implements DataSourceInterface
{
    private $id;

    public function __construct()
    {
        $this->id = (string) rand(1, 1000);
    }

    /**
     * Retrieve source identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->id;
    }
}
