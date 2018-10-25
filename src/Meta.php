<?php

namespace Syzn\JsonApi;

class Meta
{
    /**
     * Meta information store
     *
     * @var array
     */
    protected $items = [];

    /**
     * Add / update meta item
     *
     * @param string $key
     * @param string|array $value
     *
     * @return Syzn\JsonApi\Meta
     */
    public function set(string $key, $value)
    {
        $this->items[$key] = $value;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        return $this->items;
    }
}
