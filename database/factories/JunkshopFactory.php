<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Junkshop>
 */
class JunkshopFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['is_junkshop' => true]),
            'name' => fake()->name(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'address' => fake('en_PH')->address()
        ];
    }
}
