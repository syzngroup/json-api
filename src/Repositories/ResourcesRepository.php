<?php

namespace Syzn\JsonApi\Repositories;

use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceInterface;

class ResourcesRepository implements ResourcesRepositoryInterface
{
    // TODO add docblocks

    protected $resources = [];

    public function all(): array
    {
        return $this->resources;
    }

    public function findByType(string $type): array
    {
        return !empty($this->resources[$type])
            ? $this->resources[$type]
            : null;
    }

    public function findByIdentifier(string $type, $identifier)
    {
        return isset($this->resources[$type][$identifier])
            ? $this->resources[$type][$identifier]
            : null;
    }

    public function add(ResourceInterface $resource)
    {
        $type = $resource->getType();
        $id = $resource->getId();

        $this->resources[$type][$id] = $resource;
        return $this;
    }

    public function delete(string $type, $identifier)
    {
        unset($this->resources[$type][$identifier]);
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $resources = [];

        foreach ($this->resources as $resource) {
            $resources[] = $resource->toJsonApi();
        }

        return $resources;
    }
}
