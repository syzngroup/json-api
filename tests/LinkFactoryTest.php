<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Meta;
use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Links\Link;

final class LinkFactoryTest extends TestCase
{
    public function testCreateWithHref()
    {
        $link = LinkFactory::create("/example/1");

        $this->assertEquals(
            $link->getHref(),
            "/example/1"
        );
    }

    public function testCreateWithHrefAndMeta()
    {
        $meta = (new Meta)
            ->set('ttl', 3600);

        $link = LinkFactory::create(
            "/example/1",
            $meta
        );

        $this->assertEquals(
            $link->getHref(),
            "/example/1"
        );

        $this->assertEquals(
            $link->getMeta(),
            $meta
        );
    }
}
