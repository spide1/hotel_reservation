<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        RoomType::insert([
            [
                'name' => 'Single Room',
                'description' => 'Single bed room',
                'price_per_night' => 1500
            ],
            [
                'name' => 'Double Room',
                'description' => 'Two bed room',
                'price_per_night' => 2500
            ],
            [
                'name' => 'Deluxe Room',
                'description' => 'Luxury deluxe room',
                'price_per_night' => 3500
            ],
            [
                'name' => 'Suite Room',
                'description' => 'Premium suite room',
                'price_per_night' => 5000
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Top luxury suite',
                'price_per_night' => 9000
            ],
        ]);
    }
}