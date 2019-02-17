<?php

namespace Syzn\JsonApi\Tests;

use PHPUnit\Framework\TestCase;
use Syzn\JsonApi\Repositories\ErrorsRepository;
use Syzn\JsonApi\Tests\Assets\ExampleError;

final class ErrorsRepositoryTest extends TestCase
{
    public function testAddError()
    {
        $errors = [
            new ExampleError,
            new ExampleError
        ];

        $repository = (new ErrorsRepository)
            ->add($errors[0]);

        $this->assertEquals(
            $repository->all(),
            [
                $errors[0],
            ]
        );

        $repository->add($errors[1]);

        $this->assertEquals(
            $repository->all(),
            [
                $errors[0],
                $errors[1],
            ]
        );
    }
}
