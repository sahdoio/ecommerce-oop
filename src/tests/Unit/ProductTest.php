<?php


use App\Domain\Product;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     */

    #[Test]
    public function it_should_create_an_product(): void
    {
        $product = new Product(
            name: 'Domain Driven Design Book',
            description: 'Book about domain driven design',
            price: 299.2,
            categoryId: 1
        );

        dump($product);
        $this->assertTrue(true);
    }
}
