<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use ReflectionProperty;
use Taboritis\DTO\Examples\User;
use Taboritis\DTO\Formatters\DefaultFormatter;
use Taboritis\DTO\Formatters\ObjectFormatter;
use Taboritis\DTO\Formatters\PropertyFormatterFactory;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(PropertyFormatterFactory::class)]
class PropertyFormatterFactoryTest extends TestCase
{
    #[Test]
    public function it_creates_default_formatter(): void
    {
        $formatter = PropertyFormatterFactory::create(new ReflectionProperty(new User(), 'name'));

        $this->assertInstanceOf(DefaultFormatter::class, $formatter);
    }

    #[Test]
    public function it_creates_an_object_formatter(): void
    {
        $formatter = PropertyFormatterFactory::create(new ReflectionProperty(new User(), 'department'));

        $this->assertInstanceOf(ObjectFormatter::class, $formatter);
    }
}
