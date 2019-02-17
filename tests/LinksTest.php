<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Links\Links;
use Syzn\JsonApi\Factories\Links\LinkFactory;

final class LinksTests extends TestCase
{
    public function testGetSetSelf()
    {
        $self = LinkFactory::create(
            "/example/1"
        );

        $links = (new Links)
            ->setSelf($self);

        $this->assertEquals($self, $links->getSelf());
    }

    public function testGetSetRelated()
    {
        $related = LinkFactory::create(
            "/example"
        );

        $links = (new Links)
            ->setRelated($related);

        $this->assertEquals($related, $links->getRelated());
    }

    public function testRendersToJsonApi()
    {
        $self = LinkFactory::create(
            "/example/1"
        );

        $related = LinkFactory::create(
            "/example"
        );

        $links = (new Links)
            ->setSelf($self)
            ->setRelated($related);

        $expected_jsonapi_rendered_links = [
            'self' => "/example/1",
            'related' => "/example"
        ];

        $this->assertEquals($expected_jsonapi_rendered_links, $links->toJsonApi());
    }

    public function testRendersToJsonApiWithoutRelated()
    {
        $self = LinkFactory::create(
            "/example/1"
        );

        $links = (new Links)
            ->setSelf($self);

        $expected_jsonapi_rendered_links = [
            'self' => "/example/1",
        ];

        $this->assertEquals($expected_jsonapi_rendered_links, $links->toJsonApi());
    }
}
