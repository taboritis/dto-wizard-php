<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples\Factories;

use Taboritis\DTO\Examples\Person;

class PersonFactory
{
    public function create(): Person
    {
        return new Person();
    }
}