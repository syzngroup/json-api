<?php

namespace Syzn\JsonApi\Contracts\Resources;

interface QueriesMappingInterface
{
    /**
     * Get the allowed filtering properties.
     *
     * @return array
     */
    public function getFilterable(): array;

    /**
     * Get the allowed sort fields.
     *
     * @return array
     */
    public function getSortable(): array;

    /**
     * Get the fields that may be requested restrictedly.
     *
     * @return array
     */
    public function getSparsableFields(): array;

    /**
     * Check whether fetching a collection of this resource is paginated.
     *
     * @return array
     */
    public function paginatesCollection(): bool;
}
