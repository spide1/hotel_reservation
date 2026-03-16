<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {

        $roomTypes = [1,2,3,4,5];

        for ($i=1; $i<=50; $i++) {

            Room::create([
                'room_number' => 100 + $i,
                'room_type_id' => $roomTypes[array_rand($roomTypes)],
                'status' => 'available'
            ]);

        }

    }
}