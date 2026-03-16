<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
   
public function run(): void
{

    $users = User::all();
    $rooms = Room::all();

    // create demo user if none exists
    if($users->count() == 0){
        $users = collect([
            User::create([
                'name'=>'Demo User',
                'email'=>'demo@gmail.com',
                'password'=>bcrypt('password')
            ])
        ]);
    }

    foreach ($rooms->take(10) as $room) {

       Reservation::create([

    'user_id' => $users->random()->id,
    'room_id' => $room->id,

    'check_in' => Carbon::now()->addDays(rand(1,5)),
    'check_out' => Carbon::now()->addDays(rand(6,10)),

    'total_price' => rand(3000,10000),

    'status' => 'approved'

]);

    }

}
}