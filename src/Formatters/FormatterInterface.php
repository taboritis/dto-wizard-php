<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use ReflectionProperty;

interface FormatterInterface
{
    public function format(mixed $value, ReflectionProperty $property): mixed;
}
