<?php

namespace Syzn\JsonApi\Factories\Links;

use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Links\PaginationLinks;

class PaginationLinksFactory
{
    public static function create(
        LinkInterface $first,
        ?LinkInterface $last = null,
        ?LinkInterface $prev = null,
        ?LinkInterface $next = null
    ) {
        $links = (new PaginationLinks)
            ->setFirst($first);

        if ($last) {
            $links->setLast($last);
        }

        if ($prev) {
            $links->setPrev($prev);
        }

        if ($next) {
            $links->setNext($next);
        }

        return $links;
    }
}
