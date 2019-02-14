<?php

namespace Syzn\JsonApi\Contracts\Resources;

use Syzn\JsonApi\Contracts\DataInterface;
use Syzn\JsonApi\Contracts\MetaInterface;

interface BaseResourceInterface extends DataInterface
{
    /**
     * Retrieve resource type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Retrieve resource identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Retrieve resource meta.
     *
     * @return \Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface;

    /**
     * Set resource meta.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface $meta
     */
    public function setMeta(MetaInterface $meta);
}
