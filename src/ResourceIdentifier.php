<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\DataSourceInterface;
use Syzn\JsonApi\Contracts\ResourceIdentifierInterface;

class ResourceIdentifier implements ResourceIdentifierInterface
{
    /**
     * Resource type
     *
     * @var string
     */
    private $type;

    /**
     * Resource id
     *
     * @var string
     */
    private $id;

    /**
     * @param mixed $data_source
     *
     * @return void
     */
    public function __construct(DataSourceInterface $data_source)
    {
        $this->setIdentifier($data_source->getIdentifier());
    }

    /**
     * Retrieve resource type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set resource type
     *
     * @param string $type
     *
     * @return Syzn\JsonApi\Contracts\ResourceIdentifierInterface
     */
    public function setType(string $type): ResourceIdentifierInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Retrieve resource identifier
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->id;
    }

    /**
     * Set resource type
     *
     * @param string $id
     *
     * @return Syzn\JsonApi\Contracts\ResourceIdentifierInterface
     */
    public function setIdentifier(string $id): ResourceIdentifierInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        return [
            'type' => $this->getType(),
            'id' => $this->getIdentifier(),
        ];
    }
}
