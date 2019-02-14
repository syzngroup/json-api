<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\ErrorInterface;
use Syzn\JsonApi\Contracts\Links\LinksInterface;

abstract class Error implements ErrorInterface
{
    /**
     * Retrieve unique error identifier
     *
     * @return mixed
     */
    abstract public function getId();

    /**
     * Retrieve links instance related to the error
     *
     * @return Syzn\JsonApi\Contracts\Links\LinksInterface
     */
    abstract public function getLinks(): ?LinksInterface;

    /**
     * Retrieve the http status code applicable to the error
     *
     * @return int|null
     */
    abstract public function getStatus(): ?int;

    /**
     * Retrieve application-specific code applicable to the error
     *
     * @return int|null
     */
    abstract public function getCode(): ?int;

    /**
     * Retrieve short, human-readable summary of the error
     *
     * @return string|null
     */
    abstract public function getTitle(): ?string;

    /**
     * Retrieve human-readable explanation of the error
     *
     * @return string|null
     */
    abstract public function getDetail(): ?string;

    /**
     * Convert instance to json api encodable structure
     *
     * @return array
     */
    public function toJsonApi()
    {
        $error = [];

        if ($id = $this->getId()) {
            $error['id'] =  $id;
        }

        if ($links = $this->getLinks()) {
            $error['links'] = $links->toJsonApi();
        }

        if ($status = $this->getStatus()) {
            $error['status'] = $status;
        }

        if ($code = $this->getCode()) {
            $error['code'] = $code;
        }

        if ($title = $this->getTitle()) {
            $error['title'] = $title;
        }

        if ($detail = $this->getDetail()) {
            $error['detail'] = $detail;
        }

        return $error;
    }

}
