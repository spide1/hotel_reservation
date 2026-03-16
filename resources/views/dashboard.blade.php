<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Hotel Admin Dashboard
</h2>
</x-slot>

<div class="py-12">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

<!-- Manage Rooms -->
<a href="/admin/rooms" class="bg-white p-6 shadow rounded-lg hover:bg-gray-50">

<h3 class="text-lg font-bold text-gray-700">
Manage Rooms
</h3>

<p class="text-sm text-gray-500 mt-2">
Add, edit, and manage hotel rooms
</p>

</a>

<!-- Manage Room Types -->
<a href="/admin/room-types" class="bg-white p-6 shadow rounded-lg hover:bg-gray-50">

<h3 class="text-lg font-bold text-gray-700">
Room Types
</h3>

<p class="text-sm text-gray-500 mt-2">
Manage room categories and prices
</p>

</a>

<!-- Reservation Approval -->
<a href="/admin/reservations" class="bg-white p-6 shadow rounded-lg hover:bg-gray-50">

<h3 class="text-lg font-bold text-gray-700">
Reservation Approval
</h3>

<p class="text-sm text-gray-500 mt-2">
Approve or decline room bookings
</p>

</a>

</div>

</div>

</div>

</x-app-layout>