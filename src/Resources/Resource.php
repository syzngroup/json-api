<?php

namespace Syzn\JsonApi\Resources;

use Syzn\JsonApi\Contracts\DataSourceInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface;
use Syzn\JsonApi\Contracts\Resources\ResourceInterface;
use Syzn\JsonApi\Factories\LinkFactory;
use Syzn\JsonApi\Factories\LinksFactory;
use Syzn\JsonApi\Resources\BaseResource;

abstract class Resource extends BaseResource implements ResourceInterface
{
    /**
     * Resource data source.
     *
     * @var \Syzn\JsonApi\Contracts\DataSourceInterface
     */
    protected $data_source;

    /**
     * Resource attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Resource relationships.
     *
     * @var \Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface
     */
    protected $relationships;

    /**
     * Resource links.
     *
     * @var \Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    protected $links;

    /**
     * Initialize resource.
     *
     * @param \Syzn\JsonApi\Contracts\DataSourceInterface $data_source
     *
     * @return void
     */
    public function __construct(
        DataSourceInterface $data_source,
        RelationshipsRepositoryInterface $relationships = null
    ) {
        parent::__construct($data_source);
        $this->relationships = $relationships;
    }

    /**
     * Retrieve resource attributes.
     *
     * @return array
     */
    abstract public function getAttributes(): array;

    /**
     * Retrieve resource relationships.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface|null
     */
    public function getRelationships(): ?RelationshipsRepositoryInterface
    {
        return $this->relationships;
    }

    /**
     * Retrieve resource links.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface
    {
        return $this->links;
    }

    /**
     * Set resource links.
     *
     * @param \Syzn\JsonApi\Contracts\Links\LinksInterface
     *
     * @return \Syzn\JsonApi\Resources\Resource
     */
    public function setLinks(LinksInterface $links)
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $resource = parent::toJsonApi();

        $resource['attributes'] = $this->getAttributes();

        if ($links = $this->getLinks()) {
            $resource['links'] = $links->toJsonApi();
        }

        if (($relationships = $this->getRelationships()) && !empty($relationships = $relationships->all())) {
            $resource['relationships'] = [];

            foreach ($relationships as $name => $relationship) {
                $resource['relationships'][$name] = $relationship->toJsonApi();
            }
        }

        return $resource;
    }
}
