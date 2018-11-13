<?php

namespace Syzn\JsonApi\Links;

use Syzn\JsonApi\Contracts\MetaInterface;
use Syzn\JsonApi\Contracts\Links\LinkInterface;

class Link implements LinkInterface
{
    protected $href;
    protected $meta;

    /**
     * Retrieve link url
     *
     * @return string
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    public function setHref(string $href): Link
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Retrieve link meta information
     *
     * @return Syzn\JsonApi\Contracts\MetaInterface|null
     */
    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }

    public function setMeta(MetaInterface $meta): Link
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return string
     */
    public function toJsonApi()
    {
        $link = [];

        $href = $this->getHref();
        $meta = $this->getMeta();

        if ($href) {
            if (!$meta) {
                return $href;
            }

            $link['href'] = $href;
        }

        if ($meta = $this->getMeta()) {
            $link['meta'] = $this->getMeta()
                    ->toJsonApi();
        }

        return $link;
    }
}
