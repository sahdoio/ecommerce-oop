<?php

declare(strict_types=1);

namespace App\Domain;

class Cart
{
    private array $products = [];

    public function __construct(?array $products = null)
    {
        if ($products) {
            $this->products = $products;
        }
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function getProducts(): array {
        return $this->products;
    }
}
