<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'room_number' => $this->faker->numberBetween(100,999),
        'room_type_id' => \App\Models\RoomType::factory(),
        'status' => 'available'
    ];
}
}
