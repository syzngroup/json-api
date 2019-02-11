<?php

namespace Syzn\JsonApi\Contracts;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;

interface ResourceIdentifierInterface extends EncodableJsonApiStructureInterface
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
