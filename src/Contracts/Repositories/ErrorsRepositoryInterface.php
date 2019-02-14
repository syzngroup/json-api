<?php

namespace Syzn\JsonApi\Contracts\Repositories;

use Syzn\JsonApi\Contracts\EncodableJsonApiStructureInterface;
use Syzn\JsonApi\Contracts\ErrorInterface;

interface ErrorsRepositoryInterface extends EncodableJsonApiStructureInterface
{
    public function all(): array;
    public function add(ErrorInterface $error);
}
