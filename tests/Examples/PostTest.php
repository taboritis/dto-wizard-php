<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\Post;
use Taboritis\DTO\Factory;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(Post::class)]
class PostTest extends TestCase
{
    private Post $post;

    protected function setUp(): void
    {
        parent::setUp();
        $this->post = (new Factory())->create(Post::class, [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
        ]);
    }

    #[Test]
    public function it_has_a_title(): void
    {
        $this->assertNotNull($this->post->title);
    }

    #[Test]
    public function it_has_a_body(): void
    {
        $this->assertNotNull($this->post->body);
    }

    #[Test]
    public function it_can_be_created_by_factory_method(): void
    {
        $this->assertInstanceOf(Post::class, Post::create());
    }
}
