<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use DateTimeInterface;
use ReflectionClass;
use ReflectionProperty;
use Taboritis\DTO\Formatters\FormatterInterface;
use Tests\Taboritis\DTO\Examples\DefaultFormatter;
use Tests\Taboritis\DTO\Examples\ObjectFormatter;

class PropertyFormatterFactory
{
    public static function create(ReflectionProperty $property): FormatterInterface
    {
        if ($property->hasType() === false) {
            return new DefaultFormatter();
        }

        /** @phpstan-ignore-next-line */
        $name = $property->getType()->getName();

        if (!$name) {
            return new DefaultFormatter();
        }

        if (class_exists($name) === false) {
            return new DefaultFormatter();
        }

        $reflection = new ReflectionClass($name);

        if ($reflection->isInstantiable() === false) {
            return new DefaultFormatter();
        }

        if (in_array(DateTimeInterface::class, $reflection->getInterfaceNames())) {
            return new DateTimeFormatter($name);
        }

        return new ObjectFormatter($name);
    }
}
