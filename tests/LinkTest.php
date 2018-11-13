<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;

use Syzn\JsonApi\Links\Link;
use Syzn\JsonApi\Meta;

final class LinkTest extends TestCase
{

    public function testGetAndSetHref()
    {

        $example_url = "http://example.com";

        $link = (new Link)
            ->setHref($example_url);

        $this->assertEquals($example_url, $link->getHref());
    }

    public function testGetAndSetMeta()
    {
        $meta = (new Meta)
            ->set('ttl', 3600); // TODO switch to meta factory

        $link = (new Link)
            ->setMeta($meta);

        $this->assertEquals($meta, $link->getMeta());
    }

    public function testRendersToJsonApi()
    {
        $example_url = "http://example.com";

        $meta = (new Meta)
            ->set('ttl', 3600); // TODO switch to meta factory

        $link = (new Link)
            ->setHref("http://example.com")
            ->setMeta($meta);

        $expected_link_rendered = [
            'href' => $example_url,
            'meta' => $meta->toJsonApi()
        ];

        $this->assertEquals($link->toJsonApi(), $expected_link_rendered);
    }

    public function testRendersToJsonApiWithoutHref()
    {
        $meta = (new Meta)
            ->set('ttl', 3600); // TODO switch to meta factory

        $link = (new Link)
            ->setMeta($meta);

        $expected_link_rendered = [
            'meta' => $meta->toJsonApi()
        ];

        $this->assertEquals($link->toJsonApi(), $expected_link_rendered);
    }

    public function testRendersToJsonApiWithoutMeta()
    {
        $example_url = "http://example.com";

        $link = (new Link)
            ->setHref($example_url);

        $expected_link_rendered = $example_url;

        $this->assertEquals($link->toJsonApi(), $expected_link_rendered);
    }
}
