<?php

namespace Syzn\JsonApi\Factories\Links;

use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Links\Link;

class LinkFactory
{
    public static function create(string $href, ?MetaInterface $meta = null)
    {
        $link = (new Link)
            ->setHref($href);

        if ($meta) {
            $link->setMeta($meta);
        }

        return $link;
    }
}
