<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Junkshop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Booking::factory(10)->create();

        Junkshop::all()->each(function (Junkshop $junkshop) {
            $rates = [];
            foreach(range(1, mt_rand(10, 20)) as $i) {
                $rates[] = [
                    'name' => fake()->userName(),
                    'price' => mt_rand(1, 500),
                    'unit' => 'kg'
                ];
            }
            $junkshop->rates()->createMany($rates);
        });
    }
}
