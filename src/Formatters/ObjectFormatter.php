<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use ReflectionException;
use ReflectionProperty;
use Taboritis\DTO\Factory;

class ObjectFormatter implements FormatterInterface
{
    /**
     * @param array<string, mixed> $value
     * @param ReflectionProperty $property
     * @return mixed
     * @throws ReflectionException
     */
    public function format(mixed $value, ReflectionProperty $property): mixed
    {
        $factory = new Factory();

        /** @phpstan-ignore-next-line */
        $classFQN = $property->getType()->getName();

        return $factory->create($classFQN, $value);
    }
}
