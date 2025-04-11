<?php

declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\Category\Category;

class Product
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public Category $category
    ) {}

    public function getFormattedPrice(): string
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }
}
