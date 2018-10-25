<?php

namespace Syzn\JsonApi\Contracts\Relationships;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\ResourceIdentifierInterface;
use Syzn\JsonApi\Contracts\MetaInterface;

interface RelationshipInterface extends EncodableJsonApiStructure
{
    // TODO add docblocks
    public function getLinks(): ?LinksInterface;

    public function setLinks(LinksInterface $links);

    public function getMeta(): ?MetaInterface;

    public function setMeta(MetaInterface $meta);
}
