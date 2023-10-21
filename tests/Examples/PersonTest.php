<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\TestCase;
use Taboritis\DTO\Examples\Person;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Person::class)]
class PersonTest extends TestCase
{
    #[Test]
    public function it_can_be_created_with_constructor(): void
    {
        $this->assertInstanceOf(Person::class, new Person());
    }
}
