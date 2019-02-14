<?php

namespace Syzn\JsonApi\Relationships;

use Syzn\JsonApi\Contracts\Repositories\ResourceIdentifiersRepositoryInterface;
use Syzn\JsonApi\Contracts\Relationships\ToManyRelationshipInterface;
use Syzn\JsonApi\Relationships\Relationship;

class ToManyRelationship extends Relationship implements ToManyRelationshipInterface
{
    // TODO add dockblocks (copy from interface)

    protected $resource_identifiers;

    public function getData(): ?ResourceIdentifiersRepositoryInterface
    {
        return $this->resource_identifiers;
    }

    public function setData(ResourceIdentifiersRepositoryInterface $resource_identifiers): ToManyRelationship
    {
        $this->resource_identifiers = $resource_identifiers;
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

        if ($resource_identifiers = $this->getData()) {
            $relationship['data'] = [];

            foreach ($resource_identifiers->all() as $type => $resource_identifiers) {
                foreach ($resource_identifiers as $resource_identifier) {
                    $relationship['data'][] = $resource_identifier->toJsonApi();
                }
            }
        }

        // TODO throw exception if $relationship is empty at this point

        return $relationship;
    }
}
