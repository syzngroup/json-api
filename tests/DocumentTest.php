<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Meta;
use Syzn\JsonApi\Document\Builder as DocumentBuilder;
use Syzn\JsonApi\Factories\RelationshipsFactory;
use Syzn\JsonApi\Repositories\ErrorsRepository;
use Syzn\JsonApi\Repositories\ResourcesRepository;
use Syzn\JsonApi\Repositories\ResourceIdentifiersRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\ExampleError;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleArticle;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthor;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthorIdentifier;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleComment;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleCommentIdentifier;

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

    public function testDocumentWithDataAndIncludedRendersToJsonApi()
    {
        $article_data_source = new ExampleDataSource;
        $article_resource = new ExampleArticle($article_data_source);

        $author_data_source = new ExampleDataSource;
        $author_resource_identifier = new ExampleAuthorIdentifier($author_data_source);
        $author_relationship = RelationshipsFactory::createToOne($author_resource_identifier);

        $comments_data_sources = [
            new ExampleDataSource,
            new ExampleDataSource,
        ];

        $comments_resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($comments_data_sources[0]))
            ->add(new ExampleCommentIdentifier($comments_data_sources[1]));

        $comments_relatioship = RelationshipsFactory::createToMany($comments_resource_identifiers);

        $included = (new ResourcesRepository)
            ->add(new ExampleAuthor($author_data_source))
            ->add(new ExampleComment($comments_data_sources[0]))
            ->add(new ExampleComment($comments_data_sources[1]));

        $document = (new DocumentBuilder)
            ->data($article_resource)
            ->included($included)
            ->get();

        $expected_jsonapi_rendered_document = [
            'data' => $article_resource->toJsonApi(),
            'included' => $included->toJsonApi(),
        ];

        $this->assertEquals(
            $document->toJsonApi(),
            $expected_jsonapi_rendered_document
        );
    }
}
