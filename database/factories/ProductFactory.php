<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ProductBrand;
use App\Models\ProductColor;
use App\Models\ProductImage;
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
        $productColor = ProductColor::all();
        $productImage = ProductImage::all();
        return [
            'name' => fake()->word(3, true),
            'product_brand_id' => fake()->randomElement($productBrand),
            'category_id' => Category::factory(),
            'price' => fake()->numberBetween(100, 1000),
            'discounted_percentage' => fake()->numberBetween(0, 100),
            // 'image' => fake()->imageUrl(640, 480),
            'slug' => fake()->slug(),
            'description' => fake()->sentence(20),
            'new_arrival' => fake()->boolean(),
            'top_seller' => fake()->boolean(),
            'screen_size' => fake()->randomElement(['13.3" FHD', '15.6" FHD', '17" QHD']),
            'battery' => fake()->randomElement(['3-cell, 42 Wh', '4-cell, 60 Wh', '6-cell, 90 Wh', 'Built-in 58.2 Wh']),
            'processor' => \fake()->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
            'ram' => fake()->randomElement(['8GB', '16GB', '32GB']),
            'Storage' => fake()->randomElement(['256GB SSD', '512GB SSD', '1TB SSD']),
            'Graphics' => fake()->randomElement([
                'NVIDIA GTX 1650',
                'NVIDIA RTX 3060',
                'AMD Radeon RX 580',
                'Intel Iris Xe',
            ]),
            'Display' => fake()->randomElement([
                '14" FHD',
                '15.6" FHD',
                '13.3" Retina Display',
                '17" QHD'
            ]),
            'Opreation_System' => fake()->randomElement(['Windows 10', 'Windows 11', 'macOS', 'Linux']),
            'Ports_and_Connections' => fake()->randomElement([
                '2x USB-C, 1x USB-A, HDMI, Wi-Fi 6',
                '3x USB-A, 1x HDMI, Wi-Fi 5',
                '2x Thunderbolt 4, 1x USB-C, Bluetooth 5.2',
            ]),
            'warranty' => fake()->randomElement(['1 Year', '2 Years', '3 Years']),
        ];
    }
}
