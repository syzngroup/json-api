<?php

namespace Syzn\JsonApi\Links;

use Syzn\JsonApi\Contracts\Links\LinkInterface;
use Syzn\JsonApi\Contracts\Links\PaginationLinksInterface;
use Syzn\JsonApi\Links\Links;

class PaginationLinks extends Links implements PaginationLinksInterface
{
    const FIRST_KEYWORD = "first";
    const LAST_KEYWORD = "last";
    const PREV_KEYWORD = "prev";
    const NEXT_KEYWORD = "next";

    protected $first;
    protected $last;
    protected $prev;
    protected $next;

    /**
     * Retrieve first page url.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getFirst(): LinkInterface
    {
        return $this->first;
    }

    public function setFirst(LinkInterface $link): PaginationLinks
    {
        $this->first = $link;
        return $this;
    }

    /**
     * Retrieve last page url.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface
     */
    public function getLast(): ?LinkInterface
    {
        return $this->last;
    }

    public function setLast(LinkInterface $link): PaginationLinks
    {
        $this->last = $link;
        return $this;
    }

    /**
     * Retrieve previous page url.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getPrev(): ?LinkInterface
    {
        return $this->prev;
    }

    public function setPrev(LinkInterface $link): PaginationLinks
    {
        $this->prev = $link;
        return $this;
    }

    /**
     * Retrieve next page url.
     *
     * @return \Syzn\JsonApi\Contracts\Links\LinkInterface|null
     */
    public function getNext(): ?LinkInterface
    {
        return $this->next;
    }

    public function setNext(LinkInterface $link): PaginationLinks
    {
        $this->next = $link;
        return $this;
    }

    /**
     * Convert instance to json api encodable structure.
     *
     * @return array
     */
    public function toJsonApi(): array
    {
        $links = array_merge(
            parent::toJsonApi(),
            [
                self::FIRST_KEYWORD => $this->getFirst()
                    ->toJsonApi(),
                self::LAST_KEYWORD => null,
                self::PREV_KEYWORD => null,
                self::NEXT_KEYWORD => null
            ]
        );

        if ($last = $this->getLast()) {
            $links[self::LAST_KEYWORD] = $last->toJsonApi();
        }

        if ($prev = $this->getPrev()) {
            $links[self::PREV_KEYWORD] = $prev->toJsonApi();
        }

        if ($next = $this->getNext()) {
            $links[self::NEXT_KEYWORD] = $next->toJsonApi();
        }

        // TODO throw exception if links is empty (+ add test)

        return $links;
    }
}
