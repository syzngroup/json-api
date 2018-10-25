<?php

namespace Syzn\JsonApi\Contracts\Relationships;

use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;

interface ToManyRelationshipInterface extends RelationshipInterface
{
    // TODO add dockblocks
    public function getResources(): ?ResourcesRepositoryInterface;
}
