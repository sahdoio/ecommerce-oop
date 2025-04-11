<?php


use App\Domain\Cart;
use App\Domain\Product;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     */

    #[Test]
    public function it_should_create_an_product(): void
    {
        $cart = new Cart([
            new Product(
                name: 'Domain Driven Design Book',
                description: 'Book about domain driven design',
                price: 299.2,
                categoryId: '1'
            ),
            new Product(
                name: 'Domain Driven Design Book 2',
                description: 'Book about domain driven design 2',
                price: 299.2,
                categoryId: '1'
            )
        ]);
        dump($cart);
        $this->assertTrue(true);
    }
}
