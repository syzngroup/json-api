<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\DataSourceInterface;
use Syzn\JsonApi\Contracts\ResourceInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface;

use Syzn\JsonApi\Factories\LinkFactory;
use Syzn\JsonApi\Factories\LinksFactory;

use Syzn\JsonApi\ResourceIdentifier;

abstract class Resource extends ResourceIdentifier implements ResourceInterface
{

    protected $data_source;

    protected $attributes = [];
    protected $relationships;
    protected $links;

    /**
     * @param mixed $data_source
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
     * Retrieve resource attributes
     *
     * @return array
     */
    abstract public function getAttributes(): array;

    /**
     * Retrieve resource relationships
     *
     * @return Syzn\JsonApi\Contracts\Repositories\RelationshipsRepositoryInterface
     */
    public function getRelationships(): ?RelationshipsRepositoryInterface
    {
        return $this->relationships;
    }

    /**
     * Retrieve resource links
     *
     * @return Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    public function getLinks(): ?LinksInterface
    {
        return $this->links;
    }

    public function setLinks(LinksInterface $links)
    {
        $this->links = $links;
    }

    /**
     * Convert instance to json api encodable structure
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

        if (($relationships = $this->getRelationships()->all()) && !empty($relationships)) {
            $resource['relationships'] = [];

            foreach ($relationships as $name => $relationship) {
                $resource['relationships'][$name] = $relationship->toJsonApi();
            }
        }

        return $resource;
    }
}
