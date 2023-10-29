<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\User;
use Taboritis\DTO\Formatters\DefaultFormatter;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(DefaultFormatter::class)]
class DefaultFormatterTest extends TestCase
{
    #[Test]
    public function it_returns_the_same_output(): void
    {
        $formatter = new DefaultFormatter();

        $this->assertEquals(new User(), $formatter->format(new User()));
    }
}
