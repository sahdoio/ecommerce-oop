<?php

declare(strict_types=1);

namespace App\Domain\Order;

use App\Domain\Cart\Cart;

class Order
{
    public function __construct(
        public Cart $cart,
        public string $customerName
    ) {}

    public function total(): float
    {
        return $this->cart->getTotal();
    }
}
