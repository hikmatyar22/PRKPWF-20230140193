<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Product::factory(20)->create([
            'user_id' => $user->id,
        ]);

        Kategori::factory(10)->create([
            'product_id' => Product::all()->random()->id,
        ]);
    }
}
