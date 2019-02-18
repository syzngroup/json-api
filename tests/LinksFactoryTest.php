<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Factories\Links\LinksFactory;

final class LinksFactoryTest extends TestCase
{
    public function testCreateWithSelf()
    {
        $self = LinkFactory::create("/articles/1/relationships/comments");

        $links = LinksFactory::create($self);

        $this->assertEquals(
            $links->getSelf(),
            $self
        );
    }

    public function testCreateWithSelfAndRelated()
    {
        $self = LinkFactory::create("/articles/1/relationships/comments");
        $related = LinkFactory::create("/articles/1/comments");

        $links = LinksFactory::create(
            $self,
            $related
        );

        $this->assertEquals(
            $links->getSelf(),
            $self
        );

        $this->assertEquals(
            $links->getRelated(),
            $related
        );
    }
}
