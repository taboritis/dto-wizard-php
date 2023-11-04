<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

class DateTimeFormatter implements FormatterInterface
{
    public function format(mixed $value, \ReflectionProperty $property): mixed
    {
        /** @phpstan-ignore-next-line */
        $classFQN = $property->getType()->getName();

        return new $classFQN($value);
    }
}
