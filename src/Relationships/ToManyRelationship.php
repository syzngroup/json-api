<?php

namespace Syzn\JsonApi\Relationships;

use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;
use Syzn\JsonApi\Contracts\Relationships\ToManyRelationshipInterface;
use Syzn\JsonApi\Relationships\Relationship;

class ToManyRelationship extends Relationship implements ToManyRelationshipInterface
{
    // TODO add dockblocks (copy from interface)

    protected $resources;

    public function getResources(): ?ResourcesRepositoryInterface
    {
        return $this->resources;
    }

    public function setResources(ResourcesRepositoryInterface $resources)
    {
        $this->resources = $resources;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $relationship = parent::toJsonApi();

        if ($resources = $this->getResources()) {
            $relationship['data'] = [];

            foreach ($resources->all() as $type => $resources) {
                foreach ($resources as $resource) {
                    $relationship['data'][] = $resource->toJsonApi();
                }
            }
        }

        // TODO throw exception if $relationship is empty at this point

        return $relationship;
    }
}
