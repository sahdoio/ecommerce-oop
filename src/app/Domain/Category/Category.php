<?php

namespace App\Domain\Category;

class Category
{
    public function __construct(
        public int $id,
        public string $name
    ) {}
}
