<?php

namespace Syzn\JsonApi\Contracts\Relationships;

use Syzn\JsonApi\Contracts\Relationships\RelationshipInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;

interface ToOneRelationshipInterface extends RelationshipInterface
{
    public function getData(): ?ResourceIdentifierInterface;
}
