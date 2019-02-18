<?php

namespace Syzn\JsonApi\Document;

use Syzn\JsonApi\Contracts\Document\DocumentInterface;
use Syzn\JsonApi\Contracts\Document\PrimaryDataInterface;
use Syzn\JsonApi\Contracts\JsonApiInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;

class Document implements DocumentInterface
{
    /**
     * Data top level member.
     *
     * @var \Syzn\JsonApi\Contracts\Document\PrimaryDataInterface|null
     */
    private $data;

    /**
     * Errors top level member.
     *
     * @var \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null
     */
    private $errors;

    /**
     * Meta top level member.
     *
     * @var \Syzn\JsonApi\Contracts\MetaInterface|null
     */
    private $meta;

    /**
     * Jsonapi top level member.
     *
     * @var \Syzn\JsonApi\Contracts\JsonApiInterface|null
     */
    private $jsonapi;

    /**
     * Links top level member.
     *
     * @var \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    private $links;

    /**
     * Included top level member.
     *
     * @var \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null
     */
    private $included;

    /**
     * Retrieve document's data top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Document\PrimaryDataInterface
     */
    public function getData() :?PrimaryDataInterface
    {
        return $this->data;
    }

    /**
     * Set document's data top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Document\PrimaryDataInterface|null $data
     *
     * @return void
     */
    public function setData(?PrimaryDataInterface $data = null): void
    {
        $this->data = $data;
    }

    /**
     * Retrieve document's errors top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface
     */
    public function getErrors(): ?ErrorsRepositoryInterface
    {
        return $this->errors;
    }

    /**
     * Set document's errors top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null $errors
     *
     * @return void
     */
    public function setErrors(?ErrorsRepositoryInterface $errors = null): void
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve document's meta top level member.
     *
     * @return \Syzn\JsonApi\Contracts\MetaInterface
     */
    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    /**
     * Set document's meta top level member.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface|null $meta
     *
     * @return void
     */
    public function setMeta(?MetaInterface $meta = null): void
    {
        $this->meta = $meta;
    }

    /**
     * Retrieve document's json api top level member.
     *
     * @return \Syzn\JsonApi\Contracts\JsonApiInterface
     */
    public function getJsonApi(): ?JsonApiInterface
    {
        return $this->jsonapi;
    }

    /**
     * Set document's json api top level member.
     *
     * @param \Syzn\JsonApi\Contracts\JsonApiInterface|null $jsonapi
     *
     * @return void
     */
    public function setJsonApi(?JsonApiInterface $jsonapi = null): void
    {
        $this->jsonapi = $jsonapi;
    }

    /**
     * Retrieve document's links top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    public function getLinks(): ?LinksInterface
    {
        return $this->links;
    }

    /**
     * Set document's links top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Links\LinksInterface|null $links
     *
     * @return void
     */
    public function setLinks(?LinksInterface $links = null): void
    {
        $this->links = $links;
    }

    /**
     * Retrieve document's included top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface
     */
    public function getIncluded(): ?ResourcesRepositoryInterface
    {
        return $this->included;
    }

    /**
     * Set document's included top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null $included
     *
     * @return void
     */
    public function setIncluded(?ResourcesRepositoryInterface $included = null): void
    {
        $this->included = $included;
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $document = [];

        $top_level_members = [
            'data',
            'errors',
            'meta',
            'jsonapi',
            'links',
            'included',
        ];

        foreach ($top_level_members as $top_level_member) {
            if ($this->$top_level_member) {
                $document[$top_level_member] = $this->$top_level_member->toJsonApi();
            }
        }

        return $document;
    }
}
