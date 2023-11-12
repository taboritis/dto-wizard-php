<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use Exception;
use ReflectionException;
use Taboritis\DTO\Formatters\Context;

/**
 * @template T of object
 */
class Factory
{
    protected string $model;

    private Context $context;

    public function __construct(Context $context = null)
    {
        $this->context = $context ?? new Context();
    }

    /**
     * @param class-string<T> $modelFQCN
     * @param array<string, mixed> $rawData
     * @return T
     * @throws ReflectionException
     */
    public function create(string $modelFQCN, array $rawData = [])
    {
        if (!class_exists($modelFQCN)) {
            throw new Exception('Nie działa');
        }

        $model = new $modelFQCN();

        $reflection = new \ReflectionClass($model);

        foreach ($rawData as $propertyName => $propertyValue) {
            if ($reflection->hasProperty($propertyName)) {
                $value = $this->getCastedValue($reflection->getProperty($propertyName), $propertyValue);
                $reflection->getProperty($propertyName)->setValue($model, $value);
            }
        }

        return $model;
    }

    private function getCastedValue(\ReflectionProperty $property, mixed $propertyValue): mixed
    {
        $context = $this->context->getContext($property);
        $formatter = $this->context->getFormatter($context);

        return $formatter->format($propertyValue, $property);
    }
}
