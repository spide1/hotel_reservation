<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::with(['room','user'])->get();

        return view('admin.reservations.index', compact('reservations'));
    }


    public function approve($id)
{
    $reservation = Reservation::findOrFail($id);

    $reservation->update([
        'status' => 'approved'
    ]);

    $reservation->room->update([
        'status' => 'booked'
    ]);

    return back()->with('success','Reservation approved');
}

public function decline($id)
{
    $reservation = Reservation::findOrFail($id);

    $reservation->status = 'declined';
    $reservation->save();

    return redirect()->back()->with('success','Reservation declined');
}

}