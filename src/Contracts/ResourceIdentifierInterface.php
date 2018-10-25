<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructure;

interface ResourceIdentifierInterface extends EncodableJsonApiStructure
{
    /**
     * Retrieve resource type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Retrieve resource identifier
     *
     * @return string
     */
    public function getIdentifier(): string;
}
