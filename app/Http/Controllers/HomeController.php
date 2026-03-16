<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class HomeController extends Controller
{

    public function index()
    {
        $rooms = Room::with('type')->take(6)->get();

        return view('home',compact('rooms'));
    }

    public function search(Request $request)
    {

        $checkin = $request->check_in;
        $checkout = $request->check_out;

        $rooms = Room::whereDoesntHave('reservations', function ($query) use ($checkin,$checkout) {

            $query->where(function($q) use ($checkin,$checkout){

                $q->where('check_in','<',$checkout)
                  ->where('check_out','>',$checkin);

            });

        })->with('type')->get();

        return view('rooms.search',compact('rooms','checkin','checkout'));
    }

}