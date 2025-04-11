<?php

declare(strict_types=1);

namespace App\Domain\Cart;

class Cart
{
    /** @var CartItem[] */
    private array $items = [];

    public function addItem(CartItem $item): void
    {
        $this->items[] = $item;
    }

    public function getTotal(): float
    {
        return array_sum(array_map(fn($item) => $item->getTotal(), $this->items));
    }

    public function items(): array
    {
        return $this->items;
    }
}
