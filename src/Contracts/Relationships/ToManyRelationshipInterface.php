<?php

namespace Syzn\JsonApi\Contracts\Relationships;

use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourceIdentifiersRepositoryInterface;

interface ToManyRelationshipInterface extends RelationshipInterface
{
    // TODO add dockblocks

    public function getData(): ?ResourceIdentifiersRepositoryInterface;
}
