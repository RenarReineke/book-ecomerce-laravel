<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'status' => OrderStatusEnum::Processed,
        ];
    }
}
