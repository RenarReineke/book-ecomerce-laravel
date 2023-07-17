<?php

namespace App\DTO;

final class TagDto
{
    public function __construct(
        readonly public string $title
    ) {}
}
