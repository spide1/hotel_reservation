    <div class="grid grid-cols-3 gap-6">

    @foreach($rooms as $room)

    <div class="bg-white shadow p-6 rounded">

    <h2 class="text-xl font-bold">
    Room {{ $room->room_number }}
    </h2>

    <p class="text-gray-500">
    {{ $room->type->name }}
    </p>

    <p class="text-blue-600">
    ₹{{ $room->type->price_per_night }} / night
    </p>

    <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
        @csrf

        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <div class="mb-2">
    <label class="text-sm">Check In</label>
    <input type="text" name="check_in" class="border p-2 w-full rounded checkin" required>
</div>

<div class="mb-2">
    <label class="text-sm">Check Out</label>
    <input type="text" name="check_out" class="border p-2 w-full rounded checkout" required>
</div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">
            Book Now
        </button>
    </form>

    </div>

    @endforeach

    </div>

   @push('scripts') 
<script>
document.addEventListener("DOMContentLoaded", function () {

    flatpickr(".checkin", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });

    flatpickr(".checkout", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });

});
</script>
@endpush
