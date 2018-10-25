<?php

namespace Syzn\JsonApi\Factories\Links;

use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Contracts\Links\PaginationLinksInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Links\Links;

class LinksFactory
{
    public static function create(LinkInterface $self, ?LinkInterface $related = null)
    {
        $links = (new Links)
            ->setSelf($self);

        if ($related) {
            $links->setRelated($related);
        }

        return $links;
    }

// TODO might not be needed (pagination may be added to links dynamically)
    public static function createWithPagination(
        PaginationLinksInterface $pagination_links,
        LinkInterface $self,
        ?LinkInterface $related = null
    ) {
        return (new Links)
            ->setSelf($self)
            ->setRelated($related)
            ->setPagination($pagination_links);
    }
}
