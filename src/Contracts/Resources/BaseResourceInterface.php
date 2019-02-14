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
    public function getIdentifier(): string;

    /**
     * Retrieve resource meta.
     *
     * @return string
     */
    public function getMeta(): ?MetaInterface;

    /**
     * Set resource meta.
     *
     * @param \Syzn\JsonApi\Contracts\MetaInterface $meta
     *
     * @return string
     */
    public function setMeta(MetaInterface $meta);
}
