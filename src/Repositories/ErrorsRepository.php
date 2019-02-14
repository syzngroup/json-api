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

    // TODO: Does findByIdentifier needed? An error doesn't necessarily has an identifier
    public function findByIdentifier($identifier)
    {
        if ($key = $this->findErrorKey($identifier)) {
            $error = $this->errors[$key];
        } else {
            $error = null;
        }

        return $error;
    }

    public function add(ErrorInterface $error)
    {
        $this->errors[] = $error;
        return $this;
    }

    public function delete($identifier)
    {
        if ($key = $this->findErrorKey($identifier)) {
            unset($this->errors[$key]);
        }
    }

    protected function findErrorKey($identifier)
    {
        foreach ($this->errors as $key => $error) {
            if ($error->getIdentifier() === $identifier) {
                return $key;
            }
        }

        return null;
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
