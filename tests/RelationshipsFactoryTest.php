<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Meta;
use Syzn\JsonApi\Factories\RelationshipsFactory;
use Syzn\JsonApi\Factories\Links\LinkFactory;
use Syzn\JsonApi\Links\Links;
use Syzn\JsonApi\Relationships\ToOneRelationship;
use Syzn\JsonApi\Relationships\ToManyRelationship;
use Syzn\JsonApi\Repositories\ResourceIdentifiersRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthorIdentifier;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleCommentIdentifier;

final class RelationshipsFactoryTest extends TestCase
{
    public function testCreateToOne()
    {
        $data_source = new ExampleDataSource;

        $resource_identifier = new ExampleAuthorIdentifier($data_source);

        $relatioship = RelationshipsFactory::createToOne($resource_identifier);

        $this->assertEquals(
            $relatioship,
            (new ToOneRelationship)->setData($resource_identifier)
        );
    }

    public function testCreateToOneWithLinks()
    {
        $data_source = new ExampleDataSource;

        $resource_identifier = new ExampleAuthorIdentifier($data_source);

        $self = LinkFactory::create(
            "/articles/1/relationships/comments"
        );

        $links = (new Links)
            ->setSelf($self);

        $relatioship = RelationshipsFactory::createToOne(
            $resource_identifier,
            $links
        );

        $this->assertEquals(
            $relatioship,
            (new ToOneRelationship)
                ->setData($resource_identifier)
                ->setLinks($links)
        );
    }

    public function testCreateToOneWithMeta()
    {
        $data_source = new ExampleDataSource;

        $resource_identifier = new ExampleAuthorIdentifier($data_source);

        $meta = (new Meta)
            ->set("info", "Relationship meta-information");

        $relatioship = RelationshipsFactory::createToOne(
            $resource_identifier,
            null,
            $meta
        );

        $this->assertEquals(
            $relatioship,
            (new ToOneRelationship)
                ->setData($resource_identifier)
                ->setMeta($meta)
        );
    }

    public function testCreateToMany()
    {
        $data_sources = [
            new ExampleDataSource,
            new ExampleDataSource,
        ];

        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_sources[0]))
            ->add(new ExampleCommentIdentifier($data_sources[1]));

        $relatioship = RelationshipsFactory::createToMany($resource_identifiers);

        $this->assertEquals(
            $relatioship,
            (new ToManyRelationship)->setData($resource_identifiers)
        );
    }

    public function testCreateToManyWithLinks()
    {
        $data_sources = [
            new ExampleDataSource,
            new ExampleDataSource,
        ];

        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_sources[0]))
            ->add(new ExampleCommentIdentifier($data_sources[1]));

        $self = LinkFactory::create(
            "/articles/1/relationships/comments"
        );

        $links = (new Links)
            ->setSelf($self);

        $relatioship = RelationshipsFactory::createToMany(
            $resource_identifiers,
            $links
        );

        $this->assertEquals(
            $relatioship,
            (new ToManyRelationship)
                ->setData($resource_identifiers)
                ->setLinks($links)
        );
    }

    public function testCreateToManyWithMeta()
    {
        $data_sources = [
            new ExampleDataSource,
            new ExampleDataSource,
        ];

        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_sources[0]))
            ->add(new ExampleCommentIdentifier($data_sources[1]));

        $meta = (new Meta)
            ->set("info", "Relationship meta-information");

        $relatioship = RelationshipsFactory::createToMany(
            $resource_identifiers,
            null,
            $meta
        );

        $this->assertEquals(
            $relatioship,
            (new ToManyRelationship)
                ->setData($resource_identifiers)
                ->setMeta($meta)
        );
    }
}
