<?php

namespace App\DTO\Product;

use App\Enums\CoverTypeEnum;
use App\Exceptions\BusinessException;

final class ProductUpdateDto
{
    public readonly ?int $rating;

    public readonly string $cover_type;

    public function __construct(
        readonly public ?string $title,
        readonly public ?string $description,
        readonly public ?float $price,
        readonly public ?int $amount,
        readonly public ?int $pages,
        readonly public ?string $size,
        ?string $cover_type,
        readonly public ?int $weight,
        readonly public ?int $year,
        ?int $rating,
        readonly public ?int $category_id,
        readonly public ?int $publisher_id,
        readonly public ?int $series_id,
        readonly public ?array $tags,
        readonly public ?array $authors,
        readonly public ?array $images,
    ) {
        if (isset($rating) && ($rating > 10 || $rating < 1)) {
            throw new BusinessException(
                'Рейтинг не может быть выше 10 и меньше 1'
            );
        }
        $this->rating = $rating;

        // Тип обложки может быть только как в CoverTypeEnum
        if (isset($cover_type) && ! in_array($cover_type, array_map(fn ($item) => $item->value, CoverTypeEnum::cases()))) {
            throw new BusinessException(
                'Обложка может быть следующих типов: '
                .implode(', ', array_map(fn ($item) => $item->value, CoverTypeEnum::cases()))
            );
        }
        $this->cover_type = $cover_type;
    }

    // Вернуть только те поля, которые переданы для обновления
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }
}
