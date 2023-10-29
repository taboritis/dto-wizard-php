<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Formatters\DateTimeFormatter;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(DateTimeFormatter::class)]
class DateTimeFormatterTest extends TestCase
{
    #[Test]
    public function it_formats_date_time(): void
    {
        $formatter = new DateTimeFormatter(DateTime::class);

        $this->assertInstanceOf(DateTime::class, $formatter->format('now'));
    }

    #[Test]
    public function it_formats_date_time_immutable(): void
    {
        $formatter = new DateTimeFormatter(DateTimeImmutable::class);

        $this->assertInstanceOf(DateTimeImmutable::class, $formatter->format('now'));
    }
}
