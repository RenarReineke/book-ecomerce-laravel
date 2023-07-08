<?php

readonly final class ProductCreateDto {
    public function __construct(
        public string $title,
        public string $description,
        public float $price,
        public int $category_id,
    )
    {}
}