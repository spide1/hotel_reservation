<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'user_id' => \App\Models\User::factory(),
        'room_id' => \App\Models\Room::factory(),
        'check_in' => now(),
        'check_out' => now()->addDays(2),
        'status' => 'pending',
        'total_price' => 2000
    ];
}
}
