<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples\Factories;

use Taboritis\DTO\DtoFactory;
use Taboritis\DTO\Examples\Person;

class PersonFactory extends DtoFactory
{
    protected string $model = Person::class;
}
