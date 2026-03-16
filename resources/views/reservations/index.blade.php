<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800">
My Reservations
</h2>
</x-slot>

<div class="max-w-7xl mx-auto py-10">

<table class="w-full bg-white shadow rounded-lg">

<thead class="bg-gray-100">
<tr>
<th class="p-3 text-left">Room</th>
<th class="p-3">Check In</th>
<th class="p-3">Check Out</th>
<th class="p-3">Status</th>
<th class="p-3">Price</th>
<th class="p-3">Action</th>
</tr>
</thead>

<tbody>

@foreach($reservations as $reservation)

<tr class="border-t" x-data="{ open:false }">

<td class="p-3">
Room {{ $reservation->room->room_number }}
</td>

<td class="p-3">
{{ $reservation->check_in }}
</td>

<td class="p-3">
{{ $reservation->check_out }}
</td>

<td class="p-3">

@if($reservation->status == 'approved')
<span class="px-3 py-1 rounded bg-green-100 text-green-700">Approved</span>

@elseif($reservation->status == 'declined')
<span class="px-3 py-1 rounded bg-red-100 text-red-700">Declined</span>

@elseif($reservation->status == 'cancelled')
<span class="px-3 py-1 rounded bg-gray-200 text-gray-700">Cancelled</span>

@else
<span class="px-3 py-1 rounded bg-yellow-100 text-yellow-700">Pending</span>
@endif

</td>

<td class="p-3">
₹{{ $reservation->total_price }}
</td>

<td class="p-3">

@if($reservation->status == 'pending' || $reservation->status == 'approved')

<!-- Cancel Button -->
<button
@click="open = true"
class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
Cancel
</button>

<!-- Popup Modal -->
<div
x-show="open"
x-transition
class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

<div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">

<h2 class="text-lg font-bold mb-4">
Cancel Reservation
</h2>

<p class="text-gray-600 mb-6">
Are you sure you want to cancel this reservation?
</p>

<div class="flex justify-center gap-4">

<button
@click="open = false"
class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
No
</button>

<form method="POST"
action="{{ route('reservation.cancel',$reservation->id) }}">
@csrf
@method('PATCH')

<button
class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
Yes, Cancel
</button>

</form>

</div>

</div>

</div>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>