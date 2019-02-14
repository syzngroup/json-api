<?php

namespace Syzn\JsonApi\Contracts\Document;

use Syzn\JsonApi\Contracts\DataInterface;
use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;
use Syzn\JsonApi\Contracts\JsonApiInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;

interface DocumentInterface extends EncodableJsonApiStructureInterface
{
    /**
     * Retrieve document's data top level member.
     *
     * @return \Syzn\JsonApi\Contracts\DataInterface|null
     */
    public function getData(): ?DataInterface;

    /**
     * Set document's data top level member.
     *
     * @param \Syzn\JsonApi\Contracts\DataInterface|null $data
     *
     * @return void
     */
    public function setData(?DataInterface $data = null): void;

    /**
     * Retrieve document's errors top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null
     */
    public function getErrors(): ?ErrorsRepositoryInterface;

    /**
     * Set document's errors top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null $errors
     *
     * @return void
     */
    public function setErrors(?ErrorsRepositoryInterface $errors = null): void;

    /**
     * Retrieve document's meta top level member.
     *
     * @return \Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface;

    /**
     * Set document's meta top level member.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface|null $meta
     *
     * @return void
     */
    public function setMeta(?MetaInterface $meta = null): void;

    /**
     * Retrieve document's json api top level member.
     *
     * @return \Syzn\JsonApi\Contracts\JsonApiInterface|null
     */
    public function getJsonApi(): ?JsonApiInterface;

    /**
     * Set document's json api top level member.
     *
     * @param \Syzn\JsonApi\Contracts\JsonApiInterface|null $jsonapi
     *
     * @return void
     */
    public function setJsonApi(?JsonApiInterface $jsonapi = null): void;

    /**
     * Retrieve document's links top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface;

    /**
     * Set document's links top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Links\LinksInterface|null $links
     *
     * @return void
     */
    public function setLinks(?LinksInterface $links = null): void;

    /**
     * Retrieve document's included top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null
     */
    public function getIncluded(): ?ResourcesRepositoryInterface;

    /**
     * Set document's included top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null $included
     *
     * @return void
     */
    public function setIncluded(?ResourcesRepositoryInterface $included = null): void;
}
