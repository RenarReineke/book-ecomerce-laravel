<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Rewiew;
use App\Models\Series;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Product::truncate();

        Product::factory(50)->has(Tag::factory(3))
            ->has(Rewiew::factory(3)->has(Comment::factory(3)))
            ->has(Author::factory(2))
            ->has(Order::factory(2))
            ->create();

        Publisher::factory(15)->has(Series::factory(2)->has(Product::factory(3)))->create();

        Client::factory(10)->has(Rewiew::factory(3))
            ->has(Order::factory(2))
            ->create();

        Order::factory(10)->hasProducts(5)->create();

        User::factory(3)->create();
    }
}
