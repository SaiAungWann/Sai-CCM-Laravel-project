<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        return [
            'name' => fake()->name(),
            'user_id' => fake()->randomElement($users),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'city' => fake()->city(),
            'street' => fake()->streetAddress(),
            'zip_code' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'is_default' => fake()->boolean(),
        ];
    }
}
