<?php

namespace Syzn\JsonApi\Relationships;

use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\ResourceIdentifierInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;

abstract class Relationship implements RelationshipInterface
{
    // TODO add docblocks (copy from interface)

    protected $meta;
    protected $links;

    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    public function setLinks(LinksInterface $links)
    {
        $this->links = $links;
    }

    public function getLinks(): ?LinksInterface
    {
        return $this->links;
    }

    public function setMeta(MetaInterface $meta)
    {
        $this->meta = $meta;
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
