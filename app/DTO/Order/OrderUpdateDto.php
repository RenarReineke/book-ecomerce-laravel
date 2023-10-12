<?php

namespace App\DTO\Order;

final class OrderUpdateDto
{
    public readonly ?string $phone;

    public readonly ?string $address;

    public function __construct(string $phone, string $address)
    {
        $this->phone = $phone;
        $this->address = $address;
    }

    // Вернуть только те поля, которые переданы для обновления
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }
}
