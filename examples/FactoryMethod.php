<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples;

use ReflectionException;
use Taboritis\DTO\Factory;

/**
 * @template T of object
 */
trait FactoryMethod
{
    /**
     * @param array<string, mixed> $rawData
     * @return T
     * @throws ReflectionException
     */
    public static function create(array $rawData = [])
    {
        $factory = new Factory();

        /** @phpstan-ignore-next-line  */
        return $factory->create(self::class, $rawData);
    }
}
