<?php

namespace Syzn\JsonApi\Contracts;

interface EncodableJsonApiStructureInterface
{
    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi();
}
