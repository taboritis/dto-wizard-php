<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(DateTimeFormatter::class)]
class DateTimeFormatterTest extends TestCase
{
    #[Test]
    public function it_formats_date_time(): void
    {
        $formatter = new DateTimeFormatter();

        $result = $formatter->format('now', new \ReflectionProperty(User::class, 'verified_at'));

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(DateTimeImmutable::class, $result);
    }
}
