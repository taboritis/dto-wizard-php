<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples\Factories;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\DtoFactory;
use Taboritis\DTO\Examples\Factories\UserFactory;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(UserFactory::class)]
class UserFactoryTest extends TestCase
{
    private UserFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new UserFactory();
    }

    #[Test]
    public function it_creates_an_user(): void
    {
        $this->assertInstanceOf(User::class, $this->factory->create());
    }

    #[Test]
    public function it_extends_abstract_dto_factory(): void
    {
        $this->assertInstanceOf(DtoFactory::class, $this->factory);
    }
}
