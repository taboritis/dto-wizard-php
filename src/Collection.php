<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Collection implements IteratorAggregate
{
    /** @var array<string|int, mixed> */
    private array $items = [];

    /**
     * @return ArrayIterator
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function add(mixed $item): void
    {
        $this->items[] = $item;
    }

    public function first(): mixed
    {
        $this->getIterator()->rewind();

        return $this->getIterator()->current();
    }
}
