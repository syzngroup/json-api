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
     * Retrieve document's errors top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null
     */
    public function getErrors(): ?ErrorsRepositoryInterface;

    /**
     * Retrieve document's meta top level member.
     *
     * @return \Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface;

    /**
     * Retrieve document's json api top level member.
     *
     * @return \Syzn\JsonApi\Contracts\JsonApiInterface|null
     */
    public function getJsonApi(): ?JsonApiInterface;

    /**
     * Retrieve document's links top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface;

    /**
     * Retrieve document's included top level member.
     *
     * @return \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null
     */
    public function getIncluded(): ?ResourcesRepositoryInterface;
}
