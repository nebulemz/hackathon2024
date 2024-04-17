<?php

namespace Database\Factories;

use App\Models\Junkshop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'junkshop_id' => Junkshop::factory(),
            'user_id' => User::factory()->state(['is_junkshop' => false]),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected', 'done']),
            'description' => fake()->sentence(),
        ];
    }
}
