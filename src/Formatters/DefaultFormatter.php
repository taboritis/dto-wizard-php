<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

class DefaultFormatter implements FormatterInterface
{
    public function format(mixed $value, \ReflectionProperty $property = null): mixed
    {
        return $value;
    }
}
