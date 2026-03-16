<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Available Rooms
    </h2>
</x-slot>

<div class="max-w-7xl mx-auto py-10">

<div class="grid md:grid-cols-3 gap-6">

@foreach($rooms as $room)

<div class="bg-white shadow rounded-lg p-6">

<h3 class="text-xl font-bold">
Room {{ $room->room_number }}
</h3>

<p class="text-gray-500">
{{ optional($room->type)->name }}
</p>

<p class="text-indigo-600">
₹{{ optional($room->type)->price_per_night }} / night
</p>

<form method="POST" action="/reservation">

@csrf

<input type="hidden" name="room_id" value="{{ $room->id }}">
<input type="hidden" name="check_in" value="{{ $checkin ?? '' }}">
<input type="hidden" name="check_out" value="{{ $checkout ?? '' }}">

<button class="mt-4 bg-indigo-600 text-green-100 px-4 py-2 rounded w-full">
Book Now
</button>

</form>

</div>

@endforeach

</div>

</div>

</x-app-layout>