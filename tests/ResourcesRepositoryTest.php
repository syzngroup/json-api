<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Repositories\ResourcesRepository;
use Syzn\JsonApi\Tests\Assets\ExampleDataSource;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleArticle;
use Syzn\JsonApi\Tests\Assets\Resources\ExampleAuthor;

final class ResourcesRepositoryTest extends TestCase
{
    public function testAddResource()
    {
        $data_source = new ExampleDataSource;

        $resource = new ExampleArticle($data_source);

        $repository = (new ResourcesRepository)
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

    public function testaddManyResources()
    {
        $data_sources = [
             new ExampleDataSource,
             new ExampleDataSource,
        ];

        $resources = [
            new ExampleArticle($data_sources[0]),
            new ExampleArticle($data_sources[1]),
        ];

        $repository = (new ResourcesRepository)->addMany([
            $resources[0],
            $resources[1]
        ]);

        $this->assertEquals(
            $repository->all(),
            [
                'articles' => [
                    $data_sources[0]->getId() => $resources[0],
                    $data_sources[1]->getId() => $resources[1],
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
            new ExampleArticle($data_sources[0]),
            new ExampleArticle($data_sources[1]),
        ];

        $repository = (new ResourcesRepository)
            ->addMany([
                $resources[0],
                $resources[1],
            ])
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
            new ExampleArticle($data_sources[0]),
            new ExampleArticle($data_sources[1]),
            // A resource with a different type.
            new ExampleAuthor($data_sources[2]),
        ];

        $repository = (new ResourcesRepository)->addMany([
            $resources[0],
            $resources[1],
            $resources[2],
        ]);

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
            new ExampleArticle($data_sources[0]),
            new ExampleArticle($data_sources[1]),
            new ExampleAuthor($data_sources[2]),
        ];

        $repository = (new ResourcesRepository)->addMany([
            $resources[0],
            $resources[1],
            $resources[2],
        ]);

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
