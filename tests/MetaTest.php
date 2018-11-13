<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;

use Syzn\JsonApi\Meta;

final class MetaTest extends TestCase
{
    public function testSetAndGet()
    {
        $meta = new Meta;

        $meta->set("author", "Yonatan Naxon");

        $this->assertEquals("Yonatan Naxon", $meta->get("author"));
    }

    public function testRendersToJsonApi()
    {
        $meta = new Meta;

        $meta
            ->set("author", "Yonatan Naxon")
            ->set("publish_date", "28/11/2018");

        $expected_meta_rendered = [
            "author" => "Yonatan Naxon",
            "publish_date" => "28/11/2018"
        ];

        $this->assertEquals($meta->toJsonApi(), $expected_meta_rendered);
    }
}
