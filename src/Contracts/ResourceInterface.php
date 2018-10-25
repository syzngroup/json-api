<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface;
use Syzn\JsonApi\Contracts\ResourceIdentifierInterface;

interface ResourceInterface extends ResourceIdentifierInterface
{
    /**
     * Retrieve resource attributes
     *
     * @return array
     */
    public function getAttributes(): array;

    /**
     * Retrieve resource relationships
     *
     * @return Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface
     */
    public function getRelationships(): ?RelationshipsRepositoryInterface;

    /**
     * Retrieve resource links
     *
     * @return Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    public function getLinks(): ?LinksInterface;
}
