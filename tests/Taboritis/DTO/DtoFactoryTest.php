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
    private DtoFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new DtoFactory();
    }
    #[Test]
    public function it_can_create_with_given_model(): void
    {
        $data = [
            'name' => 'Piotr'
        ];

        $this->assertInstanceOf(User::class, $this->factory->create(User::class, $data));
    }
}
