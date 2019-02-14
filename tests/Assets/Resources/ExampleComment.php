<?php

namespace Syzn\JsonApi\Tests\Assets\Resources;

use Syzn\JsonApi\Resources\Resource;

class ExampleComment extends Resource
{
    protected $type = "comments";

    /**
     * Retrieve resource attributes
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return [
            'body' =>  "I like XML better",
        ];
    }
}
