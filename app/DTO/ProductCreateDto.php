<?php
namespace App\DTO;

final class ProductCreateDto {
    public function __construct(
        readonly public string $title,
        readonly public ?string $description,
        readonly public float $price,
        readonly public int $category_id,
    ) {}
}