<?php

namespace Syzn\JsonApi\Repositories;

use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;
use Syzn\JsonApi\Contracts\ResourceIdentifierInterface;

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
        return !empty($this->resources[$type]) ? $this->resources[$type] : null;
    }

    public function findByIdentifier(string $type, $identifier)
    {
        if ($key = $this->findResourceKey($type, $identifier)) {
            return $this->resources[$type][$identifier];
        }
    }

    public function add(ResourceIdentifierInterface $resource)
    {
        $type = $resource->getType();

        $this->resources[$type][] = $resource;
    }

    public function delete(string $type, $identifier)
    {
        if ($key = $this->findResourceKey($type, $identifier)) {
            unset($this->resources[$type][$key]);
        }
    }

    protected function findResourceKey(string $type, $identifier)
    {
        if (!empty($this->resources[$type])) {
            foreach ($this->resources[$type] as $key => $resource) {
                if ($resource->getIdentifier() === $identifier) {
                    return $key;
                }
            }
        }

        return null;
    }
}
