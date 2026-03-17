<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in'
        ]);

        $room = Room::with('type')->findOrFail($request->room_id);

        $price = $room->type->price_per_night;

        $days = Carbon::parse($request->check_in)
            ->diffInDays(Carbon::parse($request->check_out));

        
        if ($days <= 0) {
            return back()->with('error','Invalid booking dates');
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $price * $days,
            'status' => 'pending'
        ]);

        return back()->with('success','Reservation created successfully');
    }


    public function myBookings()
    {
        $reservations = Reservation::with('room')
            ->where('user_id',auth()->id())
            ->latest()
            ->get();

        return view('reservations.index',compact('reservations'));
    }


    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);

        
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        $reservation->update([
            'status' => 'cancelled'
        ]);

        $reservation->room->update([
            'status' => 'available'
        ]);

        return back()->with('success','Reservation cancelled');
    }
}