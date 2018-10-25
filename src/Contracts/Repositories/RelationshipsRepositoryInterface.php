<?php

namespace Syzn\JsonApi\Contracts\Repositories;

use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;

interface RelationshipsRepositoryInterface
{
    public function all(): array;
    public function findByName(string $relation_name);
    public function add(string $relation_name, RelationshipInterface $relationship);
    public function delete(string $relation_name);
}
