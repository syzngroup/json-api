<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\JsonApiInterface;
use Syzn\JsonApi\Contracts\MetaInterface;

class JsonApi implements JsonApiInterface
{
    protected $version;
    protected $meta;

    /**
     * Initialize JsonApi instance
     *
     * @return void
     */
    public function __construct(string $version, ?MetaInterface $meta = null)
    {
        $this->version = $version;
        $this->meta = $meta;
    }

    /**
     * Retrieve json api version
     *
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * Retrieve json api version meta
     *
     * @return Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $json_api =  [
            'version' => $this->getVersion()
        ];

        if ($meta = $this->getMeta()) {
            $json_api['meta'] = $meta->toJsonApi();
        }

        return $json_api;
    }
}
