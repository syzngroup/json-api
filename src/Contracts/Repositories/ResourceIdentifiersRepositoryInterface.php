<?php

namespace Syzn\JsonApi\Contracts\Repositories;

use Syzn\JsonApi\Contracts\Document\PrimaryDataInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;

interface ResourceIdentifiersRepositoryInterface extends PrimaryDataInterface
{
    public function all(): array;
    public function findByType(string $type): array;
    public function findByTypeAndId(string $type, string $id);
    public function add(ResourceIdentifierInterface $resource_identifier);
    public function delete(string $type, string $id);
}
