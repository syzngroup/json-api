<?php

namespace Syzn\JsonApi\Repositories;

use Syzn\JsonApi\Contracts\Repositories\ResourceIdentifiersRepositoryInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;

class ResourceIdentifiersRepository implements ResourceIdentifiersRepositoryInterface
{
    // TODO add docblocks

    protected $resource_identifiers = [];

    public function all(): array
    {
        return $this->resource_identifiers;
    }

    public function findByType(string $type): array
    {
        return !empty($this->resource_identifiers[$type])
            ? $this->resource_identifiers[$type]
            : null;
    }

    public function findByTypeAndId(string $type, string $id)
    {
        return isset($this->resource_identifiers[$type][$id])
            ? $this->resource_identifiers[$type][$id]
            : null;
    }

    public function add(ResourceIdentifierInterface $resource_identifier)
    {
        $type = $resource_identifier->getType();
        $id = $resource_identifier->getId();

        $this->resource_identifiers[$type][$id] = $resource_identifier;
        return $this;
    }

    public function delete(string $type, string $id)
    {
        unset($this->resources[$type][$id]);
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $resource_identifiers = [];

        foreach ($this->resource_identifiers as $resource_identifiers_by_type) {
            foreach ($resource_identifiers_by_type as $resource_identifier) {
                $resource_identifiers[] = $resource_identifier->toJsonApi();
            }
        }

        return $resource_identifiers;
    }
}
