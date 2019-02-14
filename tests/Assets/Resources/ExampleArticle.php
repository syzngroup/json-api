<?php

namespace Syzn\JsonApi\Tests\Assets\Resources;

use Syzn\JsonApi\Resources\Resource;

class ExampleArticle extends Resource
{
    protected $type = "articles";

    /**
     * Retrieve resource attributes
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return [
            'title' => "Rails is Omakase",
        ];
    }
}
