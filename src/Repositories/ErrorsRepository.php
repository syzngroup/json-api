<?php

namespace Syzn\JsonApi\Repositories;

use Syzn\JsonApi\Contracts\ErrorInterface;
use Syzn\JsonApi\Contracts\Repositories\ErrorsRepositoryInterface;

class ErrorsRepository implements ErrorsRepositoryInterface
{
    // TODO add docblocks

    protected $errors = [];

    public function all(): array
    {
        return $this->errors;
    }

    public function add(ErrorInterface $error)
    {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $errors = [];

        foreach ($this->errors as $error) {
            $errors[] = $error->toJsonApi();
        }

        return $errors;
    }
}
