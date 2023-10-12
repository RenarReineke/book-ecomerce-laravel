<?php

namespace App\DTO\Order;

use App\Models\Client;

final class OrderCreateDto
{
    public readonly string $phone;

    public readonly string $address;

    public readonly Client $client;

    public function __construct(string $phone, string $address, Client $client)
    {
        $this->phone = $phone;
        $this->address = $address;
        $this->client = $client;
    }
}
