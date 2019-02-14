<?php

namespace Syzn\JsonApi\Links;

use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;
use Syzn\JsonApi\Contracts\Links\PaginationLinksInterface;

class Links implements LinksInterface
{
    protected $self;
    protected $related;
    protected $pagination_links;

    /**
     * Retrieve self link.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getSelf(): ?LinkInterface
    {
        return $this->self;
    }

    public function setSelf(LinkInterface $link): Links
    {
        $this->self = $link;
        return $this;
    }

    /**
     * Retrieve related link.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getRelated(): ?LinkInterface
    {
        return $this->related;
    }

    public function setRelated(LinkInterface $link): Links
    {
        $this->related = $link;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $links = [];

        if ($self = $this->getSelf()) {
            $links['self'] = $self->toJsonApi();
        }

        if ($related = $this->getRelated()) {
            $links['related'] = $related->toJsonApi();
        }

        return $links;
    }
}
