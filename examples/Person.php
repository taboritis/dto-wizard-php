<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples;

use Traversable;
use Taboritis\DTO\Collection;

class Person
{
    public int $age;
    public readonly string $name;
    public \DateTime $created_at;
    public Collection $messages;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }
}