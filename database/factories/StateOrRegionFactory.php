<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StateOrRegion>
 */
class StateOrRegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $state_or_regions = [
            1 => 'Yangon',
            2 => 'Mandalay',
            3 => 'Naypyidaw',
            4 => 'Ayeyarwady',
            5 => 'Bago',
            6 => 'Magway',
            7 => 'Sagaing',
            8 => 'Tanintharyi',
            9 => 'Chin',
            10 => 'Kachin',
            11 => 'Kayah',
            12 => 'Kayin',
            13 => 'Mon',
            14 => 'Rakhine',
            15 => 'Shan'
        ];
        return [
            'name' => fake()->unique()->randomElement($state_or_regions),
        ];
    }
}
