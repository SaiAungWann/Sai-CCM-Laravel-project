<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WishListItem>
 */
class WishListItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::all();
        return [
            'wish_list_id' => WishList::factory(),
            'product_id' => fake()->randomElement($products),
        ];
    }
}
