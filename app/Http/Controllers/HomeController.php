<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\RoomType;

class HomeController extends Controller
{

    public function index()
    {
        // $rooms = Room::with('type')
        //     ->where('status','available')
        //     ->take(6)
        //     ->get();
        $rooms = RoomType::latest()->get();


        return view('home', compact('rooms'));
    }


    public function search(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in'
        ]);

        $checkin = $request->check_in;
        $checkout = $request->check_out;

        $rooms = Room::with('type')
            ->where('status','available')
            ->whereDoesntHave('reservations', function ($query) use ($checkin, $checkout) {

                $query->where(function($q) use ($checkin, $checkout){

                    $q->where('check_in','<',$checkout)
                      ->where('check_out','>',$checkin);

                });

            })
            ->get();

        return view('rooms.search', compact('rooms','checkin','checkout'));
    }


    public function roomsByType($id)
    {
        $type = RoomType::findOrFail($id);

        $rooms = Room::with('type')
            ->where('room_type_id',$id)
            ->where('status','available')
            ->get();

        return view('rooms.index', compact('rooms','type'));
    }

}