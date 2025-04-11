<?php

declare(strict_types=1);

namespace App\Domain;

class Product
{
    function __construct(
        private string $name,
        private string $description,
        private float $price,
        private  string $categoryId)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }
}
