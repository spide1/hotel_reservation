<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{

    public function index()
    {
        $types = RoomType::latest()->get();
        return view('admin.roomtypes.index', compact('types'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('room_types', 'public');
        }

        RoomType::create([
            'name' => $request->name,
            'price_per_night' => $request->price_per_night,
            'image' => $image
        ]);

        return back()->with('success', 'Room type created successfully');
    }


    public function update(Request $request, $id)
    {
        $type = RoomType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($type->image && Storage::disk('public')->exists($type->image)) {
                Storage::disk('public')->delete($type->image);
            }

            $type->image = $request->file('image')->store('room_types', 'public');
        }

        $type->update([
            'name' => $request->name,
            'price_per_night' => $request->price_per_night
        ]);

        return back()->with('success', 'Room type updated successfully');
    }


    public function destroy($id)
    {
        $type = RoomType::findOrFail($id);

        // delete image
        if ($type->image && Storage::disk('public')->exists($type->image)) {
            Storage::disk('public')->delete($type->image);
        }

        $type->delete();

        return back()->with('success', 'Room type deleted successfully');
    }

}