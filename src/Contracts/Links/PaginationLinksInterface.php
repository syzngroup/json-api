<?php

namespace Syzn\JsonApi\Contracts\Links;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;
use Syzn\JsonApi\Contracts\Links\LinkInterface;

interface PaginationLinksInterface extends EncodableJsonApiStructure
{
    /**
     * Retrieve first page url
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getFirst(): LinkInterface;

    /**
     * Retrieve last page url
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getLast(): ?LinkInterface;

    /**
     * Retrieve previous page url
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getPrev(): ?LinkInterface;

    /**
     * Retrieve next page url
     *
     * @return Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getNext(): ?LinkInterface;
}
