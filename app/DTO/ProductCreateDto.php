<?php

namespace App\DTO;

final class ProductCreateDto
{
    public function __construct(
        readonly public string $title,
        readonly public float $price,
        readonly public int $category_id,
        readonly public ?string $description,
    ) {
    }
}
