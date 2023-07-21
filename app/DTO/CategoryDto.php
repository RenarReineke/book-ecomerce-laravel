<?php

namespace App\DTO;

final class CategoryDto
{
    public function __construct(
        readonly public string $title,
        readonly public string $description,
    ) {
    }
}
