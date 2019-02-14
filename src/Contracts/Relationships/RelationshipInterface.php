<?php

namespace Syzn\JsonApi\Contracts\Relationships;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;

interface RelationshipInterface extends EncodableJsonApiStructureInterface
{
    // TODO add docblocks
    
    public function getLinks(): ?LinksInterface;

    public function getMeta(): ?MetaInterface;
}
