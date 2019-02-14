<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;

interface ErrorInterface extends EncodableJsonApiStructureInterface
{
    /**
     * Retrieve unique error identifier
     *
     * @return mixed|null
     */
    public function getIdentifier();

    /**
     * Retrieve links instance related to the error
     *
     * @return Syzn\JsonApi\Contracts\Links\LinksInterface|null
     */
    public function getLinks(): ?LinksInterface;

    /**
     * Retrieve the http status code applicable to the error
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Retrieve application-specific code applicable to the error
     *
     * @return int|null
     */
    public function getCode(): ?int;

    /**
     * Retrieve short, human-readable summary of the error
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Retrieve human-readable explanation of the error
     *
     * @return string|null
     */
    public function getDetail(): ?string;

    // TODO add source
}
