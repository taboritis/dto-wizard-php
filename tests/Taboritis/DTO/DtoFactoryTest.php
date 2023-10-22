<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\Factories\UserFactory;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(DtoFactory::class)]
class DtoFactoryTest extends TestCase
{
    #[Test]
    public function it_gets_explicite_defined_model(): void
    {
        $factory = new class extends DtoFactory {
            protected string $model = User::class;
        };

        $this->assertInstanceOf(User::class, $factory->getModel());
    }

    #[Test]
    public function it_looks_model_in_parent_namespace(): void
    {
        $factory = new UserFactory();

        $this->assertInstanceOf(User::class, $factory->getModel());
    }
}
