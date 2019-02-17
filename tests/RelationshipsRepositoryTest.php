<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Relationships\ToOneRelationship;
use Syzn\JsonApi\Relationships\ToManyRelationship;
use Syzn\JsonApi\Repositories\RelationshipsRepository;
use Syzn\JsonApi\Repositories\ResourceIdentifiersRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthorIdentifier;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleCommentIdentifier;

final class RelationshipsRepositoryTest extends TestCase
{
    public function testAddRelationship()
    {
        $data_source = new ExampleDataSource;
        $resource_identifier = new ExampleAuthorIdentifier($data_source);
        $to_one_relationship = (new ToOneRelationship)
            ->setData($resource_identifier);

        $repository = (new RelationshipsRepository)
            ->add('author', $to_one_relationship);

        $this->assertEquals(
            $repository->all(),
            [
                'author' => $to_one_relationship
            ]
        );

        $data_source = new ExampleDataSource;
        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_source));
        $to_many_relationship = (new ToManyRelationship)
            ->setData($resource_identifiers);

        $repository->add('comments', $to_many_relationship);

        $this->assertEquals(
            $repository->all(),
            [
                'author' => $to_one_relationship,
                'comments' => $to_many_relationship,
            ]
        );
    }

    public function testDeleteRelationship()
    {
        $data_source = new ExampleDataSource;
        $resource_identifier = new ExampleAuthorIdentifier($data_source);
        $to_one_relationship = (new ToOneRelationship)
            ->setData($resource_identifier);

        $repository = (new RelationshipsRepository)
            ->add('author', $to_one_relationship);

        $data_source = new ExampleDataSource;
        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_source));
        $to_many_relationship = (new ToManyRelationship)
            ->setData($resource_identifiers);

        $repository->add('comments', $to_many_relationship);

        $repository->delete('author');

        $this->assertEquals(
            $repository->all(),
            [
                'comments' => $to_many_relationship,
            ]
        );
    }

    public function testFindByName()
    {
        $data_source = new ExampleDataSource;
        $resource_identifier = new ExampleAuthorIdentifier($data_source);
        $to_one_relationship = (new ToOneRelationship)
            ->setData($resource_identifier);

        $repository = (new RelationshipsRepository)
            ->add('author', $to_one_relationship);

        $data_source = new ExampleDataSource;
        $resource_identifiers = (new ResourceIdentifiersRepository)
            ->add(new ExampleCommentIdentifier($data_source));
        $to_many_relationship = (new ToManyRelationship)
            ->setData($resource_identifiers);

        $repository->add('comments', $to_many_relationship);

        $this->assertEquals(
            $repository->findByName('author'),
            $to_one_relationship
        );

        $this->assertEquals(
            $repository->findByName('comments'),
            $to_many_relationship
        );
    }

    // public function testFindByType()
    // {
    //     $data_sources = [
    //          new ExampleDataSource,
    //          new ExampleDataSource,
    //          new ExampleDataSource,
    //     ];
    //
    //     $resources = [
    //         new ExampleArticleIdentifier($data_sources[0]),
    //         new ExampleArticleIdentifier($data_sources[1]),
    //         // A resource with a different type.
    //         new ExampleAuthorIdentifier($data_sources[2]),
    //     ];
    //
    //     $repository = (new ResourceIdentifiersRepository)
    //         ->add($resources[0])
    //         ->add($resources[1])
    //         ->add($resources[2]);
    //
    //     $this->assertEquals(
    //         $repository->findByType($resources[0]->getType()),
    //         [
    //             $data_sources[0]->getId() => $resources[0],
    //             $data_sources[1]->getId() => $resources[1],
    //         ]
    //     );
    // }
}
