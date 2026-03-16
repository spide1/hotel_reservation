<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{

    public function index()
    {
        $types = RoomType::all();
        return view('admin.roomtypes.index',compact('types'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price_per_night'=>'required'
        ]);

        RoomType::create($request->all());

        return back()->with('success','Room type created');
    }


   public function update(Request $request,$id)
{
    $request->validate([
        'name'=>'required',
        'price_per_night'=>'required'
    ]);

    $type = RoomType::findOrFail($id);

    $type->update([
        'name'=>$request->name,
        'price_per_night'=>$request->price_per_night
    ]);

    return back()->with('success','Room type updated');
}


    public function destroy($id)
    {
        RoomType::findOrFail($id)->delete();

        return back()->with('success','Room type deleted');
    }

}