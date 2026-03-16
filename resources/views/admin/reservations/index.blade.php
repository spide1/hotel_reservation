<x-app-layout>

<x-slot name="header">
<div class="flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Reservation Management
        </h2>
        <p class="text-sm text-gray-500">
            Approve or decline room bookings
        </p>
    </div>
</div>
</x-slot>


<div class="py-10">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


{{-- Alerts --}}
@if(session('success'))
<div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
{{ session('error') }}
</div>
@endif


<div class="bg-white shadow-lg rounded-xl overflow-hidden">


<table class="min-w-full divide-y divide-gray-200">

<thead class="bg-gray-50">
<tr>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
User
</th>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
Room
</th>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
Check In
</th>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
Check Out
</th>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
Status
</th>

<th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
Action
</th>

</tr>
</thead>


<tbody class="bg-white divide-y divide-gray-100">

@forelse($reservations as $res)

<tr class="hover:bg-gray-50 transition">

<td class="px-6 py-4 font-medium text-gray-800">
{{ $res->user->name }}
</td>

<td class="px-6 py-4">
Room {{ $res->room->room_number }}
</td>

<td class="px-6 py-4 text-gray-600">
{{ $res->check_in }}
</td>

<td class="px-6 py-4 text-gray-600">
{{ $res->check_out }}
</td>


<td class="px-6 py-4">

@if($res->status == 'approved')

<span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
Approved
</span>

@elseif($res->status == 'declined')

<span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
Declined
</span>

@else

<span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
Pending
</span>

@endif

</td>


<td class="px-6 py-4 space-x-2">

{{-- Approve Button --}}
@if($res->status != 'approved')

<form method="POST"
action="{{ url('/admin/reservations/'.$res->id.'/approve') }}"
class="inline">

@csrf

<button

class="bg-green-600 hover:bg-green-700 text-green-100 px-3 py-1 rounded text-sm shadow">
Approve
</button>

</form>

@endif


{{-- Decline Button --}}
@if($res->status != 'declined')

<form method="POST"
action="{{ url('/admin/reservations/'.$res->id.'/decline') }}"
class="inline">

@csrf

<button

class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm shadow">
Decline
</button>

</form>

@endif

</td>

</tr>

@empty

<tr>
<td colspan="6" class="text-center py-10 text-gray-500">
No reservations found
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</x-app-layout>