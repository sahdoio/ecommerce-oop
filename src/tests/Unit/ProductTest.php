<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Domain\Product\Product;
use App\Domain\Category\Category;

class ProductTest extends TestCase
{
    #[Test]
    public function it_should_create_a_product(): void
    {
        $category = new Category(1, 'Books');

        $product = new Product(
            name: 'Domain-Driven Design',
            description: 'Book about DDD',
            price: 120.50,
            category: $category
        );

        $this->assertEquals('Domain-Driven Design', $product->name);
        $this->assertEquals('Books', $product->category->name);
        $this->assertEquals('R$ 120,50', $product->getFormattedPrice());
    }
}
