<?php

namespace Database\Factories;

use App\Models\DealType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(1500),
            'address' => fake()->address(),
            'price' => fake()->numberBetween(1000000, 1000000000),
            'rooms' => fake()->numberBetween(1, 10),
            'floor' => fake()->numberBetween(1,13),
            'floors' => fake()->numberBetween(1,13),
            'total_area' => fake()->numberBetween(21,126),
            'living_space' => fake()->numberBetween(21,126),
            'kitchen_area' => fake()->numberBetween(21,126),
            'land_area' => fake()->numberBetween(21,126),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'user_id' => User::inRandomOrder()->role('manager')->take(1)->first()->id,
            'deal_type_id' => DealType::inRandomOrder()->take(1)->first()->id,
        ];
    }
}
