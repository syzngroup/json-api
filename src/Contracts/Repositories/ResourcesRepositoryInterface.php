<?php

namespace Syzn\JsonApi\Contracts\Repositories;

use Syzn\JsonApi\Contracts\DataInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceInterface;

interface ResourcesRepositoryInterface extends DataInterface
{
    public function all(): array;
    public function findByType(string $type): array;
    public function findByTypeAndId(string $type, string $id);
    public function add(ResourceInterface $resource);
    public function addMany(array $resources);
    public function delete(string $type, string $id);
}
