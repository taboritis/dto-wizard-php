<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(User::class)]
class UserTest extends TestCase
{
    #[Test]
    public function it_has_a_name(): void
    {
        $user = new User();
        $user->name = 'Piotr';

        $this->assertEquals('Piotr', $user->name);
    }
}
