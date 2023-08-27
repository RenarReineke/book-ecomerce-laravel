<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\User;
use App\Models\Author;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rewiew;
use App\Models\Series;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Product::truncate();

        Product::factory(50)->has(Tag::factory()->count(3))
                            ->has(Rewiew::factory()->count(3))
                            ->has(Author::factory()->count(2))
                            ->has(Series::factory()->count(2))
                            ->has(Publisher::factory()->count(2))
                            ->has(Order::factory()->count(2))
                            ->create();

        User::factory(10)->has(Rewiew::factory()->count(3))
                        ->has(Order::factory()->count(2))
                        ->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
