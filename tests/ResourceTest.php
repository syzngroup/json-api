<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Relationships\ToOneRelationship;
use Syzn\JsonApi\Relationships\ToManyRelationship;
use Syzn\JsonApi\Repositories\RelationshipsRepository;
use Syzn\JsonApi\Repositories\ResourcesRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleArticle;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthorIdentifier;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleCommentIdentifier;

final class ResourceTest extends TestCase
{
    public function testResourceRendersToJsonApi()
    {
        $data_source = new ExampleDataSource;

        $resource = new ExampleArticle($data_source);

        $expected_jsonapi_rendered_resource = [
            'type' => 'articles',
            'id' => $data_source->getIdentifier(),
            'attributes' => [
                'title' => "Rails is Omakase",
            ],
        ];

        $this->assertEquals(
            $resource->toJsonApi(),
            $expected_jsonapi_rendered_resource
        );
    }

    public function testResourceWithToOneRelationshipRendersToJsonApi()
    {
        $related_data_source = new ExampleDataSource;
        $related_resource_identifier = new ExampleAuthorIdentifier($related_data_source);

        $relatioship = (new ToOneRelationship)
            ->setResource($related_resource_identifier);

        $relationships = (new RelationshipsRepository)
            ->add('author', $relatioship);

        $primary_data_source = new ExampleDataSource;
        $primary_resource = new ExampleArticle(
            $primary_data_source,
            $relationships
        );

        $expected_jsonapi_rendered_resource = [
            'type' => 'articles',
            'id' => $primary_data_source->getIdentifier(),
            'attributes' => [
                'title' => "Rails is Omakase",
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'people',
                        'id' => $related_data_source->getIdentifier(),
                    ],
                ],
            ],
        ];

        $this->assertEquals(
            $primary_resource->toJsonApi(),
            $expected_jsonapi_rendered_resource
        );
    }

    public function testResourceWithToManyRelationshipRendersToJsonApi()
    {
        $related_data_sources = [
            new ExampleDataSource,
        ];

        $related_resources_identifiers = (new ResourcesRepository)
            ->add(new ExampleCommentIdentifier($related_data_sources[0]));

        $relatioship = (new ToManyRelationship)
            ->setResources($related_resources_identifiers);

        $relationships = (new RelationshipsRepository)
            ->add('comments', $relatioship);

        $primary_data_source = new ExampleDataSource;
        $primary_resource = new ExampleArticle(
            $primary_data_source,
            $relationships
        );

        $expected_jsonapi_rendered_resource = [
            'type' => 'articles',
            'id' => $primary_data_source->getIdentifier(),
            'attributes' => [
                'title' => "Rails is Omakase",
            ],
            'relationships' => [
                'comments' => [
                    'data' => [
                        [
                            'type' => 'comments',
                            'id' => $related_data_sources[0]->getIdentifier(),
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals(
            $primary_resource->toJsonApi(),
            $expected_jsonapi_rendered_resource
        );
    }
}
