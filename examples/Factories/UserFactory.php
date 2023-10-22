<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples\Factories;

use Taboritis\DTO\DtoFactory;
use Taboritis\DTO\Examples\User;

class UserFactory extends DtoFactory
{

    public function newInstance(): object
    {
        return new User();
    }

}
