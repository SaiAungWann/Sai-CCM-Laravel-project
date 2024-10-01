<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBrand>
 */
class ProductBrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $category = Category::all();
        return [
            'name' => fake()->randomElement(['Dell', 'HP', 'Apple', 'Asus', 'Lenovo', 'Acer']),
            'image' => fake()->imageUrl(640, 480),
            'website' => fake()->url(),
            'slug' => fake()->slug(),
            // 'category_id' => fake()->randomElement($category),
        ];
    }
}
