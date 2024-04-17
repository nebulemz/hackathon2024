<?php

namespace Database\Factories;

use App\Models\Junkshop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JunkshopRate>
 */
class JunkshopRateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'junkshop_id' => Junkshop::factory(),
            'name' => fake()->userName(),
            'price' => fake()->randomFloat(),
            'unit' => 'kg'
        ];
    }
}
