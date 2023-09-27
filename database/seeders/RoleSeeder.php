<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['title' => RoleEnum::Admin],
            ['title' => RoleEnum::Manager],
            ['title' => RoleEnum::Moderator],
        ]);
    }
}
