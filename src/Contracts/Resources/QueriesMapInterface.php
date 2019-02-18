<?php

namespace Syzn\JsonApi\Contracts\Resources;

interface QueriesMapInterface {
    public function getFilterable(): array;
    public function getSortable(): array;
    public function getSparsableFields(): array;
    public function paginatesCollection: bool;
}
