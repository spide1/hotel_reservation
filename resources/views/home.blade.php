<x-app-layout>

    <!-- HERO SECTION -->
    <div class="bg-indigo-600 text-white py-20">
        <div class="max-w-7xl mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4">
                Find Your Perfect Hotel Room
            </h1>

            <p class="text-lg mb-6">
                Book luxury rooms at the best price
            </p>

            <form action="/search" method="GET" class="mt-8 flex justify-center gap-4 flex-wrap">
                <!-- Date Range Picker -->
                <input type="text" id="date_range" placeholder="Check-in → Check-out"
                    class="p-3 rounded-lg text-black border w-64" required>

                <input type="hidden" name="check_in" id="check_in">
                <input type="hidden" name="check_out" id="check_out">

                <button class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-bold shadow">
                    Search Rooms
                </button>
            </form>
        </div>
    </div>

    <!-- FEATURED ROOMS -->
    <div class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-bold mb-6">
            Featured Rooms
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($rooms as $room)

                <div class="bg-white shadow-lg rounded-xl overflow-hidden">

                    @php
                        $roomImage = $room->image
                            ? asset('storage/' . $room->image)
                            : 'https://images.unsplash.com/photo-1566073771259-6a8506099945';
                    @endphp

                    <img src="{{ $roomImage }}" class="h-48 w-full object-cover">

                    <div class="p-5">

                        <p class="text-gray-500">
                            {{ $room->name }}
                        </p>

                        <p class="text-indigo-600 font-semibold">
                            ₹{{ $room->price_per_night }} / night
                        </p>

                        <a href="{{ route('rooms.index', $room->id) }}"
                            class="block mt-4 bg-indigo-600 text-white text-center py-2 rounded-lg">
                            View Rooms
                        </a>

                    </div>

                </div>

            @endforeach
        </div>
    </div>

    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                

                flatpickr("#date_range", {
                    mode: "range",
                    minDate: "today",
                    dateFormat: "Y-m-d",
                    allowInput: false,
                    onClose: function (selectedDates) {
                        if (selectedDates.length === 2) {
                            document.getElementById("check_in").value =
                                flatpickr.formatDate(selectedDates[0], "Y-m-d");
                            document.getElementById("check_out").value =
                                flatpickr.formatDate(selectedDates[1], "Y-m-d");
                        }
                    }
                });

            });

            document.querySelector("form[action='/search']").addEventListener("submit", function(e){

let checkin = document.getElementById("check_in").value;
let checkout = document.getElementById("check_out").value;

if(!checkin || !checkout){
    e.preventDefault();
    alert("Please select check-in and check-out dates");
}

});
        </script>
    @endpush

</x-app-layout>