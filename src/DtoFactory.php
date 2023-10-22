<?php

declare(strict_types=1);

namespace Taboritis\DTO;

abstract class DtoFactory
{
    protected string $model;

    /**
     * @param array<string, mixed> $rawData
     */
    public function create(array $rawData = []): object
    {
        $model = $this->getModel();

        $reflection = new \ReflectionClass($model);

        foreach ($reflection->getProperties() as $property) {
            if ($property->hasType()) {
                /** @phpstan-ignore-next-line */
                if ($property->getType()->getName() === Collection::class) {
                    $property->setValue($model, new Collection());
                }
            }
        }

        foreach ($rawData as $propertyName => $propertyValue) {
            if ($reflection->hasProperty($propertyName)) {
                $reflection->getProperty($propertyName)->setValue($model, $propertyValue);
            }
        }

        return $model;
    }

    public function getModel(): object
    {
        if (isset($this->model)) {
            return new $this->model();
        }

        $expectedClass = $this->getExpectedModelClass();

        if (!class_exists($expectedClass)) {
            throw new \LogicException('Expected class not found');
        }

        return new $expectedClass();
    }

    private function getExpectedModelClass(): string
    {
        $reflection = new \ReflectionClass($this);

        $expectedName = str_replace('Factory', '', $reflection->getShortName());
        $expectedNamespace = str_replace('Factories', '', $reflection->getNamespaceName());

        return $expectedNamespace . $expectedName;
    }
}
