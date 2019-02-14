<?php

namespace Syzn\JsonApi\Relationships;

use Syzn\JsonApi\Contracts\Relationships\ToOneRelationshipInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;
use Syzn\JsonApi\Relationships\Relationship;

class ToOneRelationship extends Relationship implements ToOneRelationshipInterface
{
    // TODO add docblocks (copy from interface)

    protected $resource_identifier;

    public function getData(): ?ResourceIdentifierInterface
    {
        return $this->resource_identifier;
    }

    public function setData(ResourceIdentifierInterface $resource_identifier): ToOneRelationship
    {
        $this->resource_identifier = $resource_identifier;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $relationship = parent::toJsonApi();

        if ($resource_identifier = $this->getData()) {
            $relationship['data'] = $resource_identifier->toJsonApi();
        }

        // TODO throw exception if $relationship is empty at this point

        return $relationship;
    }
}
