<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;

use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Links\PaginationLinks;

class PaginationLinksTest extends TestCase
{
    public function testGetSetFirst()
    {
        $first = LinkFactory::create(
            "example/1?page[number]=1"
        );

        $links = (new PaginationLinks)
            ->setFirst($first);

        $this->assertEquals($first, $links->getFirst());
    }

    public function testGetSetLast()
    {
        $last = LinkFactory::create(
            "example/1?page[number]=8"
        );

        $links = (new PaginationLinks)
            ->setLast($last);

        $this->assertEquals($last, $links->getLast());
    }

    public function testGetSetPrev()
    {
        $prev = LinkFactory::create(
            "example/1?page[number]=4"
        );

        $links = (new PaginationLinks)
            ->setPrev($prev);

        $this->assertEquals($prev, $links->getPrev());
    }

    public function testGetSetNext()
    {
        $next = LinkFactory::create(
            "example/1?page[number]=2"
        );

        $links = (new PaginationLinks)
            ->setNext($next);

        $this->assertEquals($next, $links->getNext());
    }

    public function testRendersToJsonApi()
    {
        $self = LinkFactory::create(
            "example/1"
        );

        $first = LinkFactory::create(
            "example/1?page[number]=1"
        );

        $last = LinkFactory::create(
            "example/1?page[number]=8"
        );

        $prev = LinkFactory::create(
            "example/1?page[number]=4"
        );

        $next = LinkFactory::create(
            "example/1?page[number]=2"
        );

        $links = (new PaginationLinks)
            ->setSelf($self)
            ->setFirst($first)
            ->setLast($last)
            ->setPrev($prev)
            ->setNext($next);

        $expected_jsonapi_rendered_links = [
            'self' => "example/1",
            'first' => "example/1?page[number]=1",
            'last' => "example/1?page[number]=8",
            'prev' => "example/1?page[number]=4",
            'next' => "example/1?page[number]=2"
        ];

        $this->assertEquals($expected_jsonapi_rendered_links, $links->toJsonApi());
    }

   public function testRendersToJsonApiWithFirstOnly()
    {
        $self = LinkFactory::create(
            "example/1"
        );

        $first = LinkFactory::create(
            "example/1?page[number]=1"
        );

        $links = (new PaginationLinks)
            ->setSelf($self)
            ->setFirst($first);

        $expected_jsonapi_rendered_links = [
            'self' => "example/1",
            'first' => "example/1?page[number]=1",
            'last' => null,
            'prev' => null,
            'next' => null
        ];

        $this->assertEquals($expected_jsonapi_rendered_links, $links->toJsonApi());
    }
}
