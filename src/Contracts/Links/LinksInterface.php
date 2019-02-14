<?php

namespace Syzn\JsonApi\Contracts\Links;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;
use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Contracts\Links\PaginationLinksInterface;

interface LinksInterface extends EncodableJsonApiStructureInterface
{
    /**
     * Retrieve self link.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getSelf(): ?LinkInterface;

    /**
     * Retrieve related link.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getRelated(): ?LinkInterface;
}
