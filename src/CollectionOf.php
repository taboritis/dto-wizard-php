<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use Attribute;

#[Attribute]
class CollectionOf
{
    /**
     * @param class-string $model
     */
    public function __construct(private readonly string $model)
    {
    }

    /**
     * @return class-string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    public function isValid(): bool
    {
        try {
            $reflection = new \ReflectionClass($this->model);

            return $reflection->isInstantiable();
        } catch (\Exception) {
            return false;
        }
    }
}
