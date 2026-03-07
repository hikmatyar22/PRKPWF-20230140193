<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Elektronik', 'Pakaian', 'Makanan & Minuman', 'Kesehatan', 'Rumah Tangga', 'Otomotif', 'Olahraga', 'Kecantikan'];

        return [
            'product_id' => Product::factory(),
            'name' => fake()->randomElement($categories),
        ];
    }
}
