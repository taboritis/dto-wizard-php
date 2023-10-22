<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples\Factories;

use Iterator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\DTO\DtoFactory;
use Taboritis\DTO\Examples\Factories\PersonFactory;
use Taboritis\DTO\Examples\Person;

#[CoversClass(PersonFactory::class)]
class PersonFactoryTest extends TestCase
{
    private PersonFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new PersonFactory();
    }

    #[Test]
    public function it_extends_dto_factory(): void
    {
        $this->assertInstanceOf(DtoFactory::class, $this->factory);
    }
    #[Test]
    public function it_creates_a_person(): void
    {
        $result = $this->factory->create();
        $this->assertInstanceOf(Person::class, $result);
    }

    #[Test]
    public function it_can_create_person_with_age(): void
    {
        $person = $this->factory->create([ 'age' => 25 ]);

        $this->assertEquals(25, $person->age);
    }

    #[Test]
    public function it_cannot_fill_non_existed_property(): void
    {
        $person = $this->factory->create([ 'owner' => 'value' ]);

        $this->assertNull($person->owner);
    }

    #[Test]
    public function it_can_cast_to_integer(): void
    {
        $person = $this->factory->create([ 'age' => '30' ]);

        $this->assertIsInt($person->age);
        $this->assertEquals(30, $person->age);
    }

    #[Test]
    public function it_can_assign_many_properties(): void
    {
        $person = $this->factory->create([
            'age' => 25,
            'name' => 'Piotr',
        ]);

        $this->assertEquals(25, $person->age);
        $this->assertEquals('Piotr', $person->name);
    }

    #[Test]
    public function it_cant_redefine_readonly_property(): void
    {
        $this->expectException(\Error::class);
        $person = $this->factory->create([ 'name' => 'Piotr' ]);

        $person->name = 'Andrzej';
    }

    #[Test]
    public function it_has_default_value(): void
    {
        $person = $this->factory->create();

        $this->assertInstanceOf(\DateTime::class, $person->created_at);
    }

    #[Test]
    public function it_has_collection_of_messages(): void
    {
        $person = $this->factory->create();

        $this->assertInstanceOf(Iterator::class, $person->messages);
    }
}
