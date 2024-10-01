<?php

namespace Database\Factories;

use App\Models\StateOrRegion;
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

        $state_or_regions = StateOrRegion::all();
        $state_or_regions = ['Yangon', 'Mandalay', 'Naypyitaw', 'Ayeyarwady', 'Bago', 'Magway', 'Sagaing', 'Tanintharyi', 'Chin', 'Kachin', 'Kayah', 'Kayin', 'Mon', 'Rakhine', 'Shan'];
        $city = ['Yangon', 'Mandalay', 'Naypyitaw', 'Ayeyarwady', 'Bago', 'Magway', 'Sagaing', 'Tanintharyi', 'Hakha', 'Myitkyina', 'Loikaw', 'Hpa-An', 'Mawlamyine', 'Taunggyi', 'Suttwe'];
        $township = ['Dekkhinathiri', 'Lewe', 'Pyinmana', 'Tatkon', 'Zeyathiri', 'Pobbathiri', 'Zabuthiri'];

        return [
            'address_name' => fake()->word(3, true),
            'is_default' => fake()->boolean(),
            'user_id' => fake()->randomElement($users),
            'state_or_region_id' => StateOrRegion::factory(),
            'city' => fake()->randomElement($city),
            'address' => fake()->streetAddress(),
            'zip_code' => fake()->postcode(),
            'telephone' => fake()->phoneNumber(),
        ];
    }
}
