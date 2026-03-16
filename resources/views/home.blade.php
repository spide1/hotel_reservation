<x-app-layout>

<!-- HERO SECTION -->
<div class="bg-indigo-600 text-black py-20">

<div class="max-w-7xl mx-auto text-center px-4">

<h1 class="text-4xl font-bold mb-4">
Find Your Perfect Hotel Room
</h1>

<p class="text-lg mb-6">
Book luxury rooms at the best price
</p>

<form action="/search" method="GET" class="mt-8 flex justify-center gap-4 flex-wrap">

<input type="date" name="check_in"
class="p-3 rounded-lg text-black border">

<input type="date" name="check_out"
class="p-3 rounded-lg text-black border">

<button
class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-bold shadow">
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

<img src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
class="h-48 w-full object-cover">

<div class="p-5">
<!-- 
<h3 class="text-lg font-bold">
Room {{ $room->room_number }}
</h3> -->

<p class="text-gray-500">
{{ optional($room->type)->name }}
</p>

<p class="text-indigo-600 font-semibold">
₹{{ optional($room->type)->price_per_night }} / night
</p>

<a href="/rooms"
class="block mt-4 bg-indigo-600 hover:bg-indigo-700 text-black text-center py-2 rounded-lg">
View Room
</a>

</div>

</div>

@endforeach

</div>

</div>

</x-app-layout>