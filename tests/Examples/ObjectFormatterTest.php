<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\User;
use Taboritis\DTO\Formatters\FormatterInterface;
use Taboritis\DTO\Formatters\ObjectFormatter;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(ObjectFormatter::class)]
class ObjectFormatterTest extends TestCase
{
    #[Test]
    public function it_implements_formatter_interface(): void
    {
        $this->assertInstanceOf(FormatterInterface::class, new ObjectFormatter(User::class));
    }

    #[Test]
    public function it_formats_to_class(): void
    {
        $formatter = new ObjectFormatter(User::class);
        $user = $formatter->format(['name' => $this->faker->name()]);

        $this->assertInstanceOf(User::class, $user);
    }
}
