<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'price' => fake()->randomDigitNotNull(),
            'amount' => fake()->randomDigitNotNull(),
            'pages' => fake()->randomDigitNotNull(),
            'size' => fake()->sentence(),
            'cover-type' => fake()->sentence(),
            'weight' => fake()->randomDigitNotNull(),
            'year' => fake()->randomDigitNotNull(),
            'rating' => fake()->randomDigitNotNull(),
            'category_id' => Category::factory(),
            'series_id' => Series::factory()

        ];
    }
}
