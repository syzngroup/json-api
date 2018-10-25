<?php

namespace Syzn\JsonApi\Contracts;

interface EncodableJsonApiStructure
{
    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi();
}
