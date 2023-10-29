<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples;

use DateTimeImmutable;

class User
{
    public readonly string $name;
    public int $age;

    public DateTimeImmutable $verified_at;

    public Department $department;

    /**
     * @var string[]
     */
    public array $types;
}
