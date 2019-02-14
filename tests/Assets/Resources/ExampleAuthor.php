<?php

namespace Syzn\JsonApi\Tests\Assets\Resources;

use Syzn\JsonApi\Resources\Resource;

class ExampleAuthor extends Resource
{
    protected $type = "people";

    /**
     * Retrieve resource attributes
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return [
            'first_name' =>  "Arad",
            'last_name' => "Zaltsberger",
        ];
    }
}
