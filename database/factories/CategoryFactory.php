<?php

namespace Database\Factories;

use App\Models\ProductBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $productBrand = ProductBrand::all();
        return [
            'name' => fake()->word(),
            'image' => fake()->imageUrl(640, 480),
            'slug' => fake()->slug(),
            // 'product_brand_id' => ProductBrand::factory(),
            // 'product_brand_id' => fake()->randomElement($productBrand),
        ];
    }
}
