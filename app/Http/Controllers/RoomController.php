<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('type')
            ->where('status','available')
            ->get();

        return view('rooms.index',compact('rooms'));
    }
}
