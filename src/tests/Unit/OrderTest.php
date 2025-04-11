<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Domain\Order\Order;
use App\Domain\Cart\Cart;
use App\Domain\Cart\CartItem;
use App\Domain\Product\Product;
use App\Domain\Category\Category;

class OrderTest extends TestCase
{
    #[Test]
    public function it_should_calculate_total_order_value(): void
    {
        $category = new Category(1, 'Books');

        $product1 = new Product('Clean Code', 'Book about clean code', 50.00, $category);
        $product2 = new Product('DDD', 'Book about domain driven design', 100.00, $category);

        $cart = new Cart();
        $cart->addItem(new CartItem($product1, 1)); // 50
        $cart->addItem(new CartItem($product2, 2)); // 200

        $order = new Order($cart, 'Lucas');

        $this->assertEquals(250.00, $order->total());
    }
}
