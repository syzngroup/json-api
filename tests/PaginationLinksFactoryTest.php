<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Factories\Links\PaginationLinksFactory;

final class PaginationLinksFactoryTest extends TestCase
{
    public function testCreateWithFirst()
    {
        $first = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=1"
        );

        $pagination = PaginationLinksFactory::create($first);

        $this->assertEquals(
            $pagination->getFirst(),
            $first
        );
    }

    public function testCreateWithFirstAndLast()
    {
        $first = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=1"
        );

        $last = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=8"
        );

        $pagination = PaginationLinksFactory::create(
            $first,
            $last
        );

        $this->assertEquals(
            $pagination->getFirst(),
            $first
        );

        $this->assertEquals(
            $pagination->getLast(),
            $last
        );
    }

    public function testCreateWithFirstLastPrevAndNext()
    {
        $first = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=1"
        );

        $last = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=8"
        );

        $prev = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=2"
        );

        $next = LinkFactory::create(
            "/articles/1/relationships/comments?page[number]=4"
        );

        $pagination = PaginationLinksFactory::create(
            $first,
            $last,
            $prev,
            $next
        );

        $this->assertEquals(
            $pagination->getFirst(),
            $first
        );

        $this->assertEquals(
            $pagination->getLast(),
            $last
        );

        $this->assertEquals(
            $pagination->getPrev(),
            $prev
        );

        $this->assertEquals(
            $pagination->getNext(),
            $next
        );
    }
}
