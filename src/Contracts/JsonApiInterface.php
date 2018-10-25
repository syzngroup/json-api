<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;

interface JsonApiInterface extends EncodableJsonApiStructure
{
    /**
     * Retrieve json api version
     *
     * @return string|null
     */
    public function getVersion(): ?string;

    /**
     * Retrieve json api version meta
     *
     * @return Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface;
}
