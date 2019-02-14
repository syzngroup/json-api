<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Meta;
use Syzn\JsonApi\Document\Builder as DocumentBuilder;
use Syzn\JsonApi\Repositories\ErrorsRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\ExampleError;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleArticle;

final class DocumentTest extends TestCase
{
    public function testDocumentWithDataRendersToJsonApi()
    {
        $resource = new ExampleArticle(new ExampleDataSource);

        $document = (new DocumentBuilder)
            ->data($resource)
            ->get();

        $expected_jsonapi_rendered_document = [
            'data' => $resource->toJsonApi(),
        ];

        $this->assertEquals(
            $document->toJsonApi(),
            $expected_jsonapi_rendered_document
        );
    }

    public function testDocumentWithErrorsRendersToJsonApi()
    {
        $errors = new ErrorsRepository;
        $errors->add(new ExampleError);

        $document = (new DocumentBuilder)
            ->errors($errors)
            ->get();

        $expected_jsonapi_rendered_document = [
            'errors' => $errors->toJsonApi(),
        ];

        $this->assertEquals(
            $document->toJsonApi(),
            $expected_jsonapi_rendered_document
        );
    }

    public function testDocumentWithDataAndMetaRendersToJsonApi()
    {
        $resource = new ExampleArticle(new ExampleDataSource);

        $meta = (new Meta)->set("author", "Yonatan Naxon");

        $document = (new DocumentBuilder)
            ->data($resource)
            ->meta($meta)
            ->get();

        $expected_jsonapi_rendered_document = [
            'data' => $resource->toJsonApi(),
            'meta' => $meta->toJsonApi(),
        ];

        $this->assertEquals(
            $document->toJsonApi(),
            $expected_jsonapi_rendered_document
        );
    }
}
