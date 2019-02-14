<?php

namespace Syzn\JsonApi\Contracts\Document;

use Syzn\JsonApi\Contracts\DataInterface;
use Syzn\JsonApi\Contracts\JsonApiInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Document\DocumentInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;

interface BuilderInterface
{
    /**
     * Set the document's data top level member.
     *
     * @param \Syzn\JsonApi\Contracts\DataInterface $data
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function data(DataInterface $data): BuilderInterface;

    /**
     * Set the document's errors top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface $errors
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function errors(ErrorsRepositoryInterface $errors): BuilderInterface;

    /**
     * Set the document's meta top level member.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface $meta
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function meta(MetaInterface $meta): BuilderInterface;

    /**
     * Set the document's json api top level member.
     *
     * @param \Syzn\JsonApi\Contracts\JsonApiInterface $jsonapi
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function jsonapi(JsonApiInterface $jsonapi): BuilderInterface;

    /**
     * Set the document's links top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Links\LinksInterface $links
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function links(LinksInterface $links): BuilderInterface;

    /**
     * Set the document's included top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface $included
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function included(ResourcesRepositoryInterface $included): BuilderInterface;

    /**
     * Get the final document instance.
     *
     * @return \Syzn\JsonApi\Contracts\Document\DocumentInterface
     */
    public function get(): DocumentInterface;
}
