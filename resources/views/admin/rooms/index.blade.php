<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800">
Manage Rooms
</h2>
</x-slot>

<div class="max-w-7xl mx-auto py-10">

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
{{ session('success') }}
</div>
@endif


{{-- Add Room --}}
<form method="POST" action="/admin/rooms" class="flex gap-4 mb-6">
@csrf

<input type="text" name="room_number"
placeholder="Room Number"
class="border p-2 rounded">

<select name="room_type_id" class="border p-2 rounded">

@foreach($types as $type)
<option value="{{ $type->id }}">
{{ $type->name }}
</option>
@endforeach

</select>

<button class="bg-indigo-600 text-white px-4 py-2 rounded">
Add Room
</button>

</form>



<table class="w-full bg-white shadow rounded">

<thead class="bg-gray-100">

<tr>
<th class="p-3">Room</th>
<th class="p-3">Type</th>
<th class="p-3">Status</th>
<th class="p-3">Actions</th>
</tr>

</thead>

<tbody>

@foreach($rooms as $room)

<tr class="border-t">

<form method="POST" action="/admin/rooms/{{ $room->id }}">
@csrf
@method('PUT')

<td class="p-3">

<input type="text"
name="room_number"
value="{{ $room->room_number }}"
class="border p-1 rounded">

</td>

<td class="p-3">

<select name="room_type_id" class="border p-1 rounded">

@foreach($types as $type)

<option value="{{ $type->id }}"
@if($room->room_type_id == $type->id) selected @endif>
{{ $type->name }}
</option>

@endforeach

</select>

</td>

<td class="p-3">

<select name="status" class="border p-1 rounded">

<option value="available"
@if($room->status=='available') selected @endif>
Available
</option>

<option value="maintenance"
@if($room->status=='maintenance') selected @endif>
Maintenance
</option>

</select>

</td>

<td class="p-3 flex gap-2">

<button class="bg-green-600 text-black px-3 py-1 rounded">
Update
</button>

</form>


<form method="POST" action="/admin/rooms/{{ $room->id }}">
@csrf
@method('DELETE')

<button class="bg-red-600 text-white px-3 py-1 rounded">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>