<?php

namespace Syzn\JsonApi\Document;

use Syzn\JsonApi\Document\Document;
use Syzn\JsonApi\Contracts\Document\PrimaryDataInterface;
use Syzn\JsonApi\Contracts\JsonApiInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Document\DocumentInterface;
use Syzn\JsonApi\Contracts\Document\BuilderInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface;
use Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface;

class Builder implements BuilderInterface
{
    /**
     * The document being built.
     *
     * @var \Syzn\JsonApi\Document\Document
     */
    protected $document;

    /**
     * Initialize document builder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Set the document's data top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Document\PrimaryDataInterface|null $data
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function data(?PrimaryDataInterface $data = null): BuilderInterface
    {
        if ($this->document->getErrors()) {
            // TODO: Throw exception:
            // The members data and errors MUST NOT coexist in the same document.
        }

        if (!$data && $this->document->getIncluded()) {
            // TODO: Throw exception:
            // If a document does not contain a top-level data key, the included
            // member MUST NOT be present either.
        }

        $this->document->setData($data);

        return $this;
    }

    /**
     * Set the document's errors top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface|null $errors
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function errors(?ErrorsRepositoryInterface $errors = null): BuilderInterface
    {
        if ($this->document->getData()) {
            // TODO: Throw exception:
            // The members data and errors MUST NOT coexist in the same document.
        }

        $this->document->setErrors($errors);

        return $this;
    }

    /**
     * Set the document's meta top level member.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface|null $meta
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function meta(?MetaInterface $meta = null): BuilderInterface
    {
        $this->document->setMeta($meta);

        return $this;
    }

    /**
     * Set the document's json api top level member.
     *
     * @param \Syzn\JsonApi\Contracts\JsonApiInterface|null $jsonapi
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function jsonapi(?JsonApiInterface $jsonapi = null): BuilderInterface
    {
        $this->document->setJsonApi($jsonapi);

        return $this;
    }

    /**
     * Set the document's included top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Links\LinksInterface|null $links
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function links(?LinksInterface $links = null): BuilderInterface
    {
        $this->document->setLinks($links);

        return $this;
    }

    /**
     * Set the document's data top level member.
     *
     * @param \Syzn\JsonApi\Contracts\Repositories\ResourcesRepositoryInterface|null $included
     *
     * @return \Syzn\JsonApi\Contracts\Document\BuilderInterface
     */
    public function included(?ResourcesRepositoryInterface $included = null): BuilderInterface
    {
        if (!$this->document->getData()) {
            // TODO: Throw exception:
            // If a document does not contain a top-level data key, the included
            // member MUST NOT be present either.
        }

        $this->document->setIncluded($included);

        return $this;
    }

    /**
     * Get the final document instance.
     *
     * @return \Syzn\JsonApi\Contracts\Document\DocumentInterface
     */
    public function get(): DocumentInterface
    {
        if (!$this->document->getData() &&
            !$this->document->getErrors() &&
            !$this->document->getMeta()) {
            // TODO: Throw exception:
            // A document MUST contain at least one of the following top-level members:
            // data, errors, meta.
        }

        return $this->document;
    }

    protected function reset(): void
    {
        $this->document = new Document;
    }
}
