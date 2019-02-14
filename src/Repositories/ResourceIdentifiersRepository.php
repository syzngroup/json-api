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

    public function findByIdentifier(string $type, $identifier)
    {
        return isset($this->resource_identifiers[$type][$identifier])
            ? $this->resource_identifiers[$type][$identifier]
            : null;
    }

    public function add(ResourceIdentifierInterface $resource_identifier)
    {
        $type = $resource_identifier->getType();
        $identifier = $resource_identifier->getId();

        $this->resource_identifiers[$type][$identifier] = $resource_identifier;
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
        $resource_identifiers = [];

        foreach ($this->resource_identifiers as $resource_identifier) {
            $resource_identifiers[] = $resource_identifier->toJsonApi();
        }

        return $resource_identifiers;
    }
}
