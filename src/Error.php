<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\ErrorInterface;

abstract class Error implements ErrorInterface
{
    /**
     * Retrieve unique error identifier
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return null;
    }

    /**
     * Retrieve links instance related to the error
     *
     * @return Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    public function getLinks(): ?LinksInterface
    {
        return null;
    }

    /**
     * Retrieve the http status code applicable to the error
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return null;
    }

    /**
     * Retrieve application-specific code applicable to the error
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return null;
    }

    /**
     * Retrieve short, human-readable summary of the error
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return null;
    }

    /**
     * Retrieve human-readable explanation of the error
     *
     * @return string|null
     */
    public function getDetail(): ?string
    {
        return null;
    }
}
