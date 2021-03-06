<?php

namespace Syzn\JsonApi\Tests\Assets;

use Syzn\JsonApi\Error;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Factories\Links\LinksFactory;

class ExampleError extends Error
{
    /**
     * Retrieve unique error identifier.
     *
     * @return mixed
     */
    public function getId()
    {
        return "1";
    }

    /**
     * Retrieve links instance related to the error.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface
    {
        return LinksFactory::create(
            LinkFactory::create("/errors/example")
        );
    }

    /**
     * Retrieve the http status code applicable to the error.
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return 404;
    }

    /**
     * Retrieve application-specific code applicable to the error.
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return 1505;
    }

    /**
     * Retrieve short, human-readable summary of the error.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return "Example Error";
    }

    /**
     * Retrieve human-readable explanation of the error.
     *
     * @return string|null
     */
    public function getDetail(): ?string
    {
        return "Explained example error";
    }

    /**
     * Retrieve meta object containing non-standard meta-information about the error.
     *
     * @return \Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface
    {
        return null;
    }
}
