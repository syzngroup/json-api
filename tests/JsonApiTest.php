<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\JsonApi;
use Syzn\JsonApi\Meta;

final class JsonApiTest extends TestCase
{
    public function testRendersToJsonApi()
    {
        $meta = (new Meta)
            ->set("updated_at", "28/11/2018");

        $json_api = new JsonApi("1.0.0", $meta);

        $expected_json_api = [
            'version' => '1.0.0',
            'meta' => [
                'updated_at' => '28/11/2018'
            ]
        ];

        $this->assertEquals($json_api->toJsonApi(), $expected_json_api);
    }

    public function testRendersToJsonApiWithoutMeta()
    {
        $json_api = new JsonApi("1.0.0");

        $expected_json_api = [
            'version' => '1.0.0',
        ];

        $this->assertEquals($json_api->toJsonApi(), $expected_json_api);
    }

    public function testGetVersion()
    {
        $version = (new JsonApi("1.0.0"))
            ->getVersion();

        $this->assertInternalType('string', $version);
        $this->assertEquals($version, "1.0.0");
    }

    public function testGetMeta()
    {
        $meta = (new Meta)
            ->set("updated_at", "28/11/2018");

        $json_api = new JsonApi("1.0.0", $meta);

        $this->assertEquals($json_api->getMeta(), $meta);
    }
}
