<?php

namespace Syzn\JsonApi\Contracts\Repositories;

use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;

interface ResourcesRepositoryInterface
{
    public function all(): array;
    public function findByType(string $type): array;
    public function findByIdentifier(string $type, $identifier);
    public function add(ResourceIdentifierInterface $resource);
    public function delete(string $type, $identifier);
}
