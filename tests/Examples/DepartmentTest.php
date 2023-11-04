<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Factory;
use Taboritis\DTO\Examples\Department;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(Department::class)]
class DepartmentTest extends TestCase
{
    #[Test]
    public function it_can_set_private_property(): void
    {
        $rawData = [
            'hash' => $hash = $this->faker->sha256()
        ];

        $factory = new Factory();
        $department = $factory->create(Department::class, $rawData);

        $this->assertEquals($hash, $department->getHash());
    }
}
