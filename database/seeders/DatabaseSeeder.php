<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WishList;
use App\Models\WishListItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::factory(3)
        //     ->has(Product::factory()->count(5))
        //     // ->has(ProductBrand::factory()->count(1))
        //     ->create();
        ProductBrand::factory(3)->create();

        Category::factory(3)
            ->has(Product::factory()->count(5), "products")
            ->create();

        User::factory(3)
            ->has(UserAddress::factory()->count(1), "user_addresses")
            ->has(Cart::factory()
                ->has(CartItem::factory()->count(5), "cart_items")
                ->count(1))
            // ->has(Order::factory()
            // ->has(OrderItem::factory()->count(5), "orderItems")
            // ->count(3), "orders")
            ->has(WishList::factory()
                ->has(WishListItem::factory()->count(5), "wish_list_items")
                ->count(1), "wish_list")
            ->create();

        // the code below is the same as the code ->has(CartItem::factory()->count(5))->count(1), "cart_items")
        // $carts = Cart::all(); //3
        // $carts->each(function ($cart) {
        //     CartItem::factory(5)->create(['cart_id' => $cart->id]); //15
        // });
    }
}
