<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Room Types
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10">

        {{-- Add Room Type --}}
        <form method="POST" action="{{ url('/admin/room-types') }}" enctype="multipart/form-data"
            class="mb-6 flex gap-4">

            @csrf

            <input type="text" name="name" placeholder="Room Type" class="border rounded p-2">

            <input type="number" name="price_per_night" placeholder="Price" class="border rounded p-2">

            <input type="file" name="image" class="border rounded p-2">

            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Add
            </button>

        </form>


        <table class="w-full bg-white shadow rounded-lg">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-left">Image</th>
                    <th class="p-3 text-left">Room Type</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Actions</th>
                </tr>

            </thead>

            <tbody>

                @foreach($types as $type)

                    <tr class="border-t">

                        <td class="p-3">

                            @if($type->image)
                                <img src="{{ asset('storage/' . $type->image) }}" class="h-12 w-16 object-cover rounded">
                            @endif

                        </td>

                        <td class="p-3">

                            <form method="POST" action="{{ url('/admin/room-types/' . $type->id) }}"
                                enctype="multipart/form-data" class="flex gap-3 items-center">

                                @csrf
                                @method('PUT')

                                <input type="text" name="name" value="{{ $type->name }}" class="border rounded p-1">

                        </td>

                        <td class="p-3">

                            <input type="number" name="price_per_night" value="{{ $type->price_per_night }}"
                                class="border rounded p-1">

                        </td>

                        <td class="p-3 flex gap-2">

                            <input type="file" name="image" class="border p-1">

                            <button class="bg-green-600 text-white px-3 py-1 rounded">
                                Update
                            </button>

                            </form>

                            <form method="POST" action="{{ url('/admin/room-types/' . $type->id) }}">

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