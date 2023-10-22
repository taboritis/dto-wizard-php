<?php

declare(strict_types=1);

namespace Taboritis\DTO;

abstract class DtoFactory
{
    /**
     * @param array<string, mixed> $rawData
     */
    public function create(array $rawData = []): object
    {
        $person = $this->newInstance();

        $reflection = new \ReflectionClass($person);

        foreach ($reflection->getProperties() as $property) {
            if ($property->hasType()) {
                /** @phpstan-ignore-next-line */
                if ($property->getType()->getName() === Collection::class) {
                    $property->setValue($person, new Collection());
                }
            }
        }

        foreach ($rawData as $propertyName => $propertyValue) {
            if ($reflection->hasProperty($propertyName)) {
                $reflection->getProperty($propertyName)->setValue($person, $propertyValue);
            }
        }


        return $person;
    }

    abstract public function newInstance(): object;
}
