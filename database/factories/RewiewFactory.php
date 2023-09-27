<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rewiew>
 */
class RewiewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profit' => fake()->word(),
            'unprofit' => fake()->word(),
            'text' => fake()->text(),
            'rating' => fake()->numberBetween(0, 5),
            'client_id' => Client::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
