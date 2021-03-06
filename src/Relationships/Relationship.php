<?php

namespace Syzn\JsonApi\Relationships;

use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;

abstract class Relationship implements RelationshipInterface
{
    // TODO add docblocks (copy from interface)

    protected $meta;
    protected $links;

    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    public function setLinks(LinksInterface $links): Relationship
    {
        $this->links = $links;
        return $this;
    }

    public function getLinks(): ?LinksInterface
    {
        return $this->links;
    }

    public function setMeta(MetaInterface $meta): Relationship
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $relationship = [];

        if ($meta = $this->getMeta()) {
            $relationship['meta'] = $meta->toJsonApi();
        }

        if ($links = $this->getLinks()) {
            $relationship['links'] = $links->toJsonApi();
        }

        return $relationship;
    }
}
