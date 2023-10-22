<?php

declare(strict_types=1);

namespace Taboritis\DTO;

use Iterator;

class Collection implements Iterator
{
    /** @var array<int|string, mixed> */
    private array $items = [];

    public function current(): mixed
    {
        return current($this->items);
    }

    public function next(): void
    {
        // TODO: Implement next() method.
    }

    public function key(): mixed
    {
        return $this->items[$this->current()];
    }

    public function valid(): bool
    {
        return true;
    }

    public function rewind(): void
    {
        // TODO: Implement rewind() method.
    }
}
