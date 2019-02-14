<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface;
use Syzn\JsonApi\Contracts\Resources\BaseResourceInterface;

interface ResourceInterface extends BaseResourceInterface
{
    /**
     * Retrieve resource attributes.
     *
     * @return array
     */
    public function getAttributes(): array;

    /**
     * Retrieve resource relationships.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface|null
     */
    public function getRelationships(): ?RelationshipsRepositoryInterface;

    /**
     * Retrieve resource links.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface;
}
