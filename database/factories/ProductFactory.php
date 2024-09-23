<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ProductBrand;
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

        // $name = fake()->name();
        $productBrand = ProductBrand::all();
        return [
            'name' => fake()->name(),
            'product_brand_id' => fake()->randomElement($productBrand),
            'category_id' => Category::factory(),
            'price' => fake()->numberBetween(100, 1000),
            'discounted_percentage' => fake()->numberBetween(0, 100),
            'image' => fake()->imageUrl(640, 480),
            'slug' => fake()->slug(),
            'description' => fake()->sentence(20),
            'new_arrival' => fake()->boolean(),
            'top_seller' => fake()->boolean(),
            'Memory' => fake()->sentence(5),
            'Storage' => fake()->sentence(5),
            'Graphics' => fake()->sentence(5),
            'Display' => fake()->sentence(5),
            'Battery' => fake()->sentence(5),
            'Opreation_System' => fake()->sentence(5),
            'Ports_and_Connections' => fake()->sentence(5),
            'warranty' => fake()->sentence(5),
        ];
    }
}
