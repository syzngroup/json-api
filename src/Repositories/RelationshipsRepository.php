<?php

namespace Syzn\JsonApi\Repositories;

use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;
use Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface;
use Syzn\JsonApi\Contracts\ResourceInterface;

class RelationshipsRepository implements RelationshipsRepositoryInterface
{

    protected $relationships = [];

    public function all(): array
    {
        return $this->relationships;
    }

    public function findByName(string $relation_name)
    {
        return isset($this->relationships[$relation_name]) ?
            $this->relationships[$relation_name] :
            null;
    }

    public function add(string $relation_name, RelationshipInterface $relationship)
    {
        $this->relationships[$relation_name] = $relationship;
        return $this;
    }

    public function delete(string $relation_name)
    {
        unset($this->relationships[$relation_name]);
    }
}
