<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // disable middleware (auth + admin)
        $this->withoutMiddleware();
    }

    /** @test */
    public function user_can_view_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    // public function user_can_search_rooms()
    // {
    //     $user = User::factory()->create();

    //     $type = RoomType::factory()->create();

    //     Room::factory()->create([
    //         'room_type_id' => $type->id,
    //         'status' => 'available'
    //     ]);

    //     $response = $this->actingAs($user)
    //         ->get('/search?check_in=2026-03-20&check_out=2026-03-22');

    //     $response->assertStatus(200);
    // }

    /** @test */
    // public function user_can_book_room()
    // {
    //     $user = User::factory()->create();

    //     $type = RoomType::factory()->create([
    //         'price_per_night' => 1000
    //     ]);

    //     $room = Room::factory()->create([
    //         'room_type_id' => $type->id,
    //         'status' => 'available'
    //     ]);

    //     $this->actingAs($user)->post('/reservation', [
    //         'room_id' => $room->id,
    //         'check_in' => '2026-03-20',
    //         'check_out' => '2026-03-22',
    //     ]);

    //     $this->assertDatabaseHas('reservations', [
    //         'room_id' => $room->id,
    //         'user_id' => $user->id
    //     ]);
    // }

    /** @test */
    // public function user_can_cancel_booking()
    // {
    //     $user = User::factory()->create();

    //     $room = Room::factory()->create();

    //     $reservation = Reservation::factory()->create([
    //         'user_id' => $user->id,
    //         'room_id' => $room->id,
    //         'status' => 'pending'
    //     ]);

    //     $this->actingAs($user)
    //         ->patch('/reservation/'.$reservation->id.'/cancel');

    //     $this->assertDatabaseHas('reservations', [
    //         'id' => $reservation->id,
    //         'status' => 'cancelled'
    //     ]);
    // }

    /** @test */
    // public function admin_can_approve_reservation()
    // {
    //     $admin = User::factory()->create([
    //         'role' => 'admin'
    //     ]);

    //     $reservation = Reservation::factory()->create([
    //         'status' => 'pending'
    //     ]);

    //     $this->actingAs($admin)
    //         ->post('/admin/reservations/'.$reservation->id.'/approve');

    //     $this->assertDatabaseHas('reservations', [
    //         'id' => $reservation->id,
    //         'status' => 'approved'
    //     ]);
    // }
}