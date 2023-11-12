<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\Factories\UserFactory;
use Taboritis\DTO\Examples\Post;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\Taboritis\DTO\Formatters\DefaultFormatter;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(Factory::class)]
class FactoryTest extends TestCase
{
    private Factory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new Factory();
    }
    #[Test]
    public function it_can_create_with_given_model(): void
    {
        $data = [
            'name' => 'Piotr'
        ];

        $this->assertInstanceOf(User::class, $this->factory->create(User::class, $data));
    }

    #[Test]
    public function it_can_create_many_objects(): void
    {
        $rawData = [
            ['title' => $this->faker->sentence()],
            ['title' => $this->faker->sentence()]
        ];

        $collection = $this->factory->createMany(Post::class, $rawData);

        $this->assertInstanceOf(Collection::class, $collection);
    }
}
