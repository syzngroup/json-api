<?php

namespace Syzn\JsonApi\Factories;

use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourceIdentifiersRepositoryInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;
use Syzn\JsonApi\Relationships\ToOneRelationship;
use Syzn\JsonApi\Relationships\ToManyRelationship;

class RelationshipsFactory
{
    public static function createToOne(
        ResourceIdentifierInterface $resource_identifier = null,
        LinksInterface $links = null,
        MetaInterface $meta = null
    ): ToOneRelationship {
        // TODO throw exception if all parameters are null

        $relationship = new ToOneRelationship;

        if ($resource_identifier) {
            $relationship->setData($resource_identifier);
        }

        if ($links) {
            $relationship->setLinks($links);
        }

        if ($meta) {
            $relationship->setMeta($meta);
        }

        return $relationship;
    }

    public static function createToMany(
        ResourceIdentifiersRepositoryInterface $resource_identifiers,
        LinksInterface $links = null,
        MetaInterface $meta = null
    ): ToManyRelationship {
        // TODO throw exception if all parameters are null

        $relationship = new ToManyRelationship;

        if ($resource_identifiers) {
            $relationship->setData($resource_identifiers);
        }

        if ($links) {
            $relationship->setLinks($links);
        }

        if ($meta) {
            $relationship->setMeta($meta);
        }

        return $relationship;
    }
}
