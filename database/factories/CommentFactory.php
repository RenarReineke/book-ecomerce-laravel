<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Rewiew;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => fake()->text(),
            'client_id' => Client::factory(),
            'rewiew_id' => Rewiew::factory(),
        ];
    }
}
