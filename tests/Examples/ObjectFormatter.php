<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use Taboritis\DTO\DtoFactory;
use Taboritis\DTO\Formatters\FormatterInterface;

class ObjectFormatter implements FormatterInterface
{
    public function __construct(private string $classFQN)
    {
    }

    public function format(mixed $rawData): mixed
    {
        $factory = new DtoFactory();

        return $factory->create($this->classFQN, $rawData);
    }
}
