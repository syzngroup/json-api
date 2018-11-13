<?php

namespace Syzn\JsonApi\Contracts\Links;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;
use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Contracts\Links\PaginationLinksInterface;

interface LinksInterface extends EncodableJsonApiStructure
{
    /**
     * Retrieve self link
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getSelf(): LinkInterface;

    /**
     * Retrieve related link
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getRelated(): ?LinkInterface;
}
