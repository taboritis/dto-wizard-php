<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use DateTimeInterface;
use ReflectionClass;
use Traversable;

class Context
{
    public const DEFAULT_TYPES = ['string', 'bool', 'int', 'float', 'double', 'array'];

    /** @var array<string, FormatterInterface> */
    private static array $formatters = [];

    public function getFormatter(string $context): FormatterInterface
    {
        if (!isset(self::$formatters[$context])) {
            self::$formatters[$context] = match ($context) {
                'object' => new ObjectFormatter(),
                'collection' => new CollectionFormatter(),
                'date', 'datetime' => new DateTimeFormatter(),
                default => new DefaultFormatter()
            };
        }

        return self::$formatters[$context];
    }

    public function getContext(\ReflectionProperty $property): string
    {
        if ($property->hasType() === false) {
            return 'default';
        }

        /** @phpstan-ignore-next-line */
        $name = $property->getType()->getName();

        if (!$name) {
            return 'default';
        }

        if (in_array($name, self::DEFAULT_TYPES)) {
            return 'default';
        }

        if (class_exists($name) === false) {
            return 'default';
        }

        $reflection = new ReflectionClass($name);

        if ($reflection->isInstantiable() === false) {
            return 'default';
        }

        if (in_array(DateTimeInterface::class, $reflection->getInterfaceNames())) {
            return 'datetime';
        }

        if ($reflection->implementsInterface(Traversable::class)) {
            return 'collection';
        }

        return 'object';
    }
}
