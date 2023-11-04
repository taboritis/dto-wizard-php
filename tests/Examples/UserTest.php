<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use DateTimeInterface;
use Iterator;
use IteratorAggregate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Factory;
use Taboritis\DTO\Examples\Department;
use Taboritis\DTO\Examples\Post;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(User::class)]
class UserTest extends TestCase
{
    protected Factory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new Factory();
    }

    #[Test]
    public function it_has_a_name(): void
    {
        $user = $this->factory->create(User::class, ['name' => 'Piotr']);

        $this->assertEquals('Piotr', $user->name);
    }

    #[Test]
    public function it_has_not_fakeProperty(): void
    {
        $user = $this->factory->create(User::class, ['fakeProperty' => 'Piotr']);

        $this->assertNull($user->fakeProperty);
    }

    #[Test]
    public function an_age_can_be_converted_to_int(): void
    {
        $user = $this->factory->create(User::class, ['age' => '30']);

        $this->assertIsInt($user->age);
    }

    #[Test]
    public function readonly_property_cannot_be_set(): void
    {
        $this->expectException(\Error::class);

        $user = $this->factory->create(User::class);
        $user->name = 'Test';
    }

    #[Test]
    public function it_can_covert_date_to_datetime(): void
    {
        $user = $this->factory->create(User::class, ['verified_at' => '2021-10-12']);

        $this->assertInstanceOf(DateTimeInterface::class, $user->verified_at);
    }

    #[Test]
    public function it_can_convert_to_simple_object(): void
    {
        $user = $this->factory->create(User::class, ['department' => [
            'country' => $country = $this->faker->address(),
            'address' => $address = $this->faker->address(),
        ]]);

        $this->assertInstanceOf(Department::class, $user->department);
        $this->assertEquals($country, $user->department->country);
        $this->assertEquals($address, $user->department->address);
    }

    #[Test]
    public function it_can_set_array_property(): void
    {
        $user = $this->factory->create(User::class, [
            'types' => $types = ['student', 'candidate', 'absolwent']
        ]);

        $this->assertIsArray($user->types);
        $this->assertEquals($types, $user->types);
    }

    #[Test]
    public function it_has_many_posts(): void
    {
        $user = $this->factory->create(User::class, [
            'posts' => [
                ['title' => $this->faker->sentence(), 'body' => $this->faker->paragraph()],
                ['title' => $this->faker->sentence(), 'body' => $this->faker->paragraph()],
            ]
        ]);

        $this->assertInstanceOf(IteratorAggregate::class, $user->posts);
        $this->assertInstanceOf(Post::class, $user->posts->first());
    }
}
