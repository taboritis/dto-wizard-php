<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use ReflectionException;
use ReflectionProperty;
use Taboritis\DTO\Collection;
use Taboritis\DTO\CollectionOf;
use Taboritis\DTO\Factory;

class CollectionFormatter implements FormatterInterface
{
    /**
     * @param array<array<string, mixed>> $value
     * @param ReflectionProperty $property
     * @return mixed
     * @throws ReflectionException
     */
    public function format(mixed $value, ReflectionProperty $property): mixed
    {
        $test = $property->getAttributes()[0];
        $instance = $test->newInstance();

        if (!$instance instanceof CollectionOf || !$instance->isValid()) {
            throw new \RuntimeException('Invalid type');
        }

        $factory = new Factory();
        $collection = new Collection();

        foreach ($value as $item) {
            $collection->add($factory->create($instance->getModel(), $item));
        }

        return $collection;
    }
}
