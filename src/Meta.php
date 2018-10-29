<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\MetaInterface;

class Meta implements MetaInterface
{
    /**
     * Meta information store
     *
     * @var array
     */
    protected $items = [];

    /**
     * Retrieve meta item by key
     *
     * @param string $key
     *
     * @param mixed $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return empty($this->items[$key]) ? $default : $this->items[$key];
    }

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
