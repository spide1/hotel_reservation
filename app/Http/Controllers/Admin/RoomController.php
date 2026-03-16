<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::with('type')->get();
        $types = RoomType::all();

        return view('admin.rooms.index',compact('rooms','types'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'room_number'=>'required',
            'room_type_id'=>'required'
        ]);

        Room::create([
            'room_number'=>$request->room_number,
            'room_type_id'=>$request->room_type_id,
            'status'=>'available'
        ]);

        return back()->with('success','Room added');
    }


    public function update(Request $request,$id)
{
    $request->validate([
        'room_number' => 'required',
        'room_type_id' => 'required'
    ]);

    $room = Room::findOrFail($id);

    $room->update([
        'room_number' => $request->room_number,
        'room_type_id' => $request->room_type_id,
        'status' => $request->status
    ]);

    return back()->with('success','Room updated successfully');
}


    public function destroy($id)
    {
        Room::findOrFail($id)->delete();

        return back()->with('success','Room deleted');
    }

}