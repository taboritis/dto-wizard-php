<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use ReflectionException;
use Taboritis\DTO\DtoFactory;

/**
 * @template T of object
 */
class ObjectFormatter implements FormatterInterface
{
    /**
     * @param class-string<T> $classFQN
     */
    public function __construct(private readonly string $classFQN)
    {
    }

    /**
     * @param array<string, mixed> $rawData
     * @throws ReflectionException
     */
    public function format(mixed $rawData): mixed
    {
        $factory = new DtoFactory();

        return $factory->create($this->classFQN, $rawData);
    }
}
