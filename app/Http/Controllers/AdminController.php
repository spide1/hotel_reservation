<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;

class AdminController extends Controller
{

    public function dashboard()
    {
        $totalRooms = Room::count();

        $totalReservations = Reservation::count();

        $pendingReservations = Reservation::where('status','pending')->count();

        $approvedReservations = Reservation::where('status','approved')->count();

        $totalUsers = User::count();

        $revenue = Reservation::where('status','approved')->sum('total_price');


        return view('dashboard', compact(
            'totalRooms',
            'totalReservations',
            'pendingReservations',
            'approvedReservations',
            'totalUsers',
            'revenue'
        ));
    }

}