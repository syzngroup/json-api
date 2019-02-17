<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Repositories\ResourceIdentifiersRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleArticleIdentifier;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthorIdentifier;

final class ResourceIdentifiersRepositoryTest extends TestCase
{
    public function testAddResource()
    {
        $data_source = new ExampleDataSource;

        $resource = new ExampleArticleIdentifier($data_source);

        $repository = (new ResourceIdentifiersRepository)
            ->add($resource);

        $this->assertEquals(
            $repository->all(),
            [
                'articles' => [
                    $data_source->getId() => $resource,
                ],
            ]
        );
    }

    public function testDeleteResource()
    {
        $data_sources = [
             new ExampleDataSource,
             new ExampleDataSource,
        ];

        $resources = [
            new ExampleArticleIdentifier($data_sources[0]),
            new ExampleArticleIdentifier($data_sources[1]),
        ];

        $repository = (new ResourceIdentifiersRepository)
            ->add($resources[0])
            ->add($resources[1])
            ->delete($resources[0]->getType(), $data_sources[0]->getId());

        $this->assertEquals(
            $repository->all(),
            [
                'articles' => [
                    $data_sources[1]->getId() => $resources[1],
                ],
            ]
        );
    }

    public function testFindByType()
    {
        $data_sources = [
             new ExampleDataSource,
             new ExampleDataSource,
             new ExampleDataSource,
        ];

        $resources = [
            new ExampleArticleIdentifier($data_sources[0]),
            new ExampleArticleIdentifier($data_sources[1]),
            // A resource with a different type.
            new ExampleAuthorIdentifier($data_sources[2]),
        ];

        $repository = (new ResourceIdentifiersRepository)
            ->add($resources[0])
            ->add($resources[1])
            ->add($resources[2]);

        $this->assertEquals(
            $repository->findByType($resources[0]->getType()),
            [
                $data_sources[0]->getId() => $resources[0],
                $data_sources[1]->getId() => $resources[1],
            ]
        );

        $this->assertEquals(
            $repository->findByType($resources[2]->getType()),
            [
                $data_sources[2]->getId() => $resources[2],
            ]
        );
    }

    public function testFindByTypeAndId()
    {
        $data_sources = [
             new ExampleDataSource,
             new ExampleDataSource,
             new ExampleDataSource,
        ];

        $resources = [
            new ExampleArticleIdentifier($data_sources[0]),
            new ExampleArticleIdentifier($data_sources[1]),
            new ExampleAuthorIdentifier($data_sources[2]),
        ];

        $repository = (new ResourceIdentifiersRepository)
            ->add($resources[0])
            ->add($resources[1])
            ->add($resources[2]);

        $this->assertEquals(
            $repository->findByTypeAndId($resources[0]->getType(), $data_sources[0]->getId()),
            $resources[0]
        );

        $this->assertEquals(
            $repository->findByTypeAndId($resources[1]->getType(), $data_sources[1]->getId()),
            $resources[1]
        );

        $this->assertEquals(
            $repository->findByTypeAndId($resources[2]->getType(), $data_sources[2]->getId()),
            $resources[2]
        );
    }
}
