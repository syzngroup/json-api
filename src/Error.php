<?php

namespace Syzn\JsonApi;

use Syzn\JsonApi\Contracts\ErrorInterface;

abstract class Error implements ErrorInterface
{
    /**
     * Convert instance to json api encodable structure.
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
