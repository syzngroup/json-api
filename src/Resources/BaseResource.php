<?php

namespace Syzn\JsonApi\Resources;

use Syzn\JsonApi\Contracts\DataSourceInterface;
use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Resources\BaseResourceInterface;

abstract class BaseResource implements BaseResourceInterface
{
    /**
     * Resource type.
     *
     * @var string
     */
    protected $type;

    /**
     * Resource id.
     *
     * @var string
     */
    private $id;

    /**
     * Resource meta.
     *
     * @var \Syzn\JsonApi\Contracts\MetaInterface
     */
    private $meta;

    /**
     * Initialize resource identifier.
     *
     * @param \Syzn\JsonApi\Contracts\DataSourceInterface $data_source
     *
     * @return void
     */
    public function __construct(DataSourceInterface $data_source)
    {
        $this->setId($data_source->getIdentifier());
    }

    /**
     * Retrieve resource type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set resource type.
     *
     * @param string $type
     *
     * @return \Syzn\JsonApi\Contracts\Resources\BaseResourceInterface
     */
    public function setType(string $type): ResourceIdentifierInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Retrieve resource identifier.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set resource type.
     *
     * @param string $id
     *
     * @return \Syzn\JsonApi\Contracts\Resources\BaseResourceInterface
     */
    public function setId(string $id): BaseResourceInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Retrieve resource meta.
     *
     * @return string
     */
    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    /**
     * Set resource meta.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface $meta
     *
     * @return string
     */
    public function setMeta(MetaInterface $meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        return [
            'type' => $this->getType(),
            'id' => $this->getId(),
        ];
    }
}
