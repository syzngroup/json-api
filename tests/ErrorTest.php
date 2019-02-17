<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Tests\Assets\ExampleError;

final class ErrorTest extends TestCase
{
    public function testRendersToJsonApi()
    {
        $expected_jsonapi_rendered_error = [
            'id' => "1",
            'links' => [
                'self' => '/errors/example'
            ],
            'status' => 404,
            'code' => 1505,
            'title' => "Example Error",
            'detail' => "Explained example error"
        ];

        $jsonapi_error = new ExampleError;

        $this->assertEquals(
            $jsonapi_error->toJsonApi(),
            $expected_jsonapi_rendered_error
        );
    }
}
