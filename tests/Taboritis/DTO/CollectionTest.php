<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use ArrayIterator;
use IteratorAggregate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\Post;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(Collection::class)]
class CollectionTest extends TestCase
{
    private Collection $collection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->collection = new Collection();
    }

    #[Test]
    public function it_implements_iterator_aggregate(): void
    {
        $this->assertInstanceOf(IteratorAggregate::class, $this->collection);
    }

    #[Test]
    public function it_has_array_iterator(): void
    {
        $this->assertInstanceOf(ArrayIterator::class, $this->collection->getIterator());
    }

    #[Test]
    public function it_can_add_item(): void
    {
        $this->collection->add(new Post());

        $this->assertCount(1, $this->collection);
    }
}
