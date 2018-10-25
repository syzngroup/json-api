<?php

namespace Syzn\JsonApi\Contracts\Links;

use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;

interface LinkInterface extends EncodableJsonApiStructure
{
    /**
     * Retrieve link url
     *
     * @return string
     */
    public function getHref(): string;

    /**
     * Retrieve link meta information
     *
     * @return Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface;
}