<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Domain\Cart\Cart;
use App\Domain\Cart\CartItem;
use App\Domain\Product\Product;
use App\Domain\Category\Category;

class CartTest extends TestCase
{
    #[Test]
    public function it_should_return_all_cart_items(): void
    {
        $category = new Category(1, 'Books');
        $product = new Product('Clean Code', 'Book about clean code', 50.00, $category);

        $cart = new Cart();
        $cart->addItem(new CartItem($product, 2));

        $items = $cart->items();

        $this->assertCount(1, $items);
        $this->assertInstanceOf(CartItem::class, $items[0]);
        $this->assertEquals(100.00, $items[0]->getTotal());
    }

}
