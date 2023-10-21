<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples\Factories;

use PHPUnit\Framework\TestCase;
use Taboritis\DTO\Examples\Person;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\CoversClass;
use Taboritis\DTO\Examples\Factories\PersonFactory;

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
    public function it_creates_a_person(): void
    {
        $result = $this->factory->create();
        $this->assertInstanceOf(Person::class, $result);
    }
}
