<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

class DateTimeFormatter implements FormatterInterface
{
    /**
     * @param string $name
     */
    public function __construct(private string $name)
    {
    }

    public function format(mixed $value): mixed
    {
        return new $this->name($value);
    }
}
