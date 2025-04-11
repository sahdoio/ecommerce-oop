<?php

namespace Tests\Unit;

use App\Domain\Cart\CartItem;
use App\Domain\Category\Category;
use App\Domain\Product\Product;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CartItemTest extends TestCase
{
    #[Test]
    public function it_should_calculate_total_price(): void
    {
        $category = new Category(1, 'Books');

        $product = new Product(
            name: 'Refactoring',
            description: 'Book about refactoring',
            price: 100.00,
            category: $category
        );

        $item = new CartItem($product, 3);

        $this->assertEquals(300.00, $item->getTotal());
    }
}
