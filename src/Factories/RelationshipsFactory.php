<?php

namespace Syzn\JsonApi\Factories;

use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceIdentifierInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Relationships\ToOneRelationship;
use Syzn\JsonApi\Relationships\ToManyRelationship;

class RelationshipsFactory
{
    public static function createToOne(
        ResourceIdentifierInterface $resource = null,
        LinksInterface $links = null,
        MetaInterface $meta = null
    ): ToOneRelationship {
        // TODO throw exception if all parameters are null

        $relationship = new ToOneRelationship;

        if ($resource) {
            $relationship->setData($resource);
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
        ResourcesRepositoryInterface $resources,
        LinksInterface $links = null,
        MetaInterface $meta = null
    ): ToManyRelationship {
        // TODO throw exception if all parameters are null

        $relationship = new ToManyRelationship;

        if ($resources) {
            $relationship->setData($resources);
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
