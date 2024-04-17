<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Junkshop;
use App\Models\JunkshopRate;
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
        User::factory()->create([
            'email' => 'user@example.com',
        ]);

        $junkshopOwner = User::factory()
            ->has(
                Junkshop::factory()
                    ->state([
                        'address' => '270 Escolta St, Binondo, Manila, 1006 Metro Manila',
                        'latitude' => 14.596832613099675,
                        'longitude' => 120.97781481335105
                    ])
                    ->has(
                        JunkshopRate::factory()
                            ->count(20),
                        'rates'
                    )
            )
            ->create([
                'email' => 'junkshop@example.com',
                'is_junkshop' => true
            ]);

        $junkshopOwner = User::factory()
            ->has(
                Junkshop::factory()
                    ->state([
                        'address' => '557 M. De Santos St, San Nicolas, Manila, 1010 Metro Manila',
                        'latitude' => 14.602366437258466,
                        'longitude' => 120.97010864909832
                    ])
                    ->has(
                        JunkshopRate::factory()
                            ->count(20),
                        'rates'
                    )
            )
            ->create([
                'email' => 'junkshop2@example.com',
                'is_junkshop' => true
            ]);
        // Booking::factory(10)->create();

        // Junkshop::all()->each(function (Junkshop $junkshop) {
        //     $rates = [];
        //     foreach(range(1, mt_rand(10, 20)) as $i) {
        //         $rates[] = [
        //             'name' => fake()->userName(),
        //             'price' => mt_rand(1, 500),
        //             'unit' => 'kg'
        //         ];
        //     }
        //     $junkshop->rates()->createMany($rates);
        // });
    }
}
