@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Room</h1>

    <form method="POST" action="{{ route('room.store') }}">
        @csrf

        <!-- Room Number -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Room Number</label>
            <input type="text" name="room_number" class="mt-1 block w-full border border-gray-300 p-2 rounded" required>
        </div>

        <!-- Bed Type -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Bed Type</label>
            <select name="bed_type" class="mt-1 block w-full border border-gray-300 p-2 rounded" required>
                <option value="Single bed">Single bed</option>
                <option value="Double bed">Double bed</option>
                <option value="Queen">Queen</option>
                <option value="King">King</option>
            </select>
        </div>

        {{-- <!-- Room Type -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Room Type</label>
            <select name="room_type" class="mt-1 block w-full border border-gray-300 p-2 rounded" required>
                <option value="">-- Select Type --</option>
                <option value="Standard">Standard</option>
                <option value="Deluxe">Deluxe</option>
                <option value="VIP">VIP</option>
            </select>
        </div> --}}

        <!-- Floor -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Floor</label>
            <input type="text" name="floor" class="mt-1 block w-full border border-gray-300 p-2 rounded" required>
        </div>

        <!-- Facility -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Facility</label>
            <textarea name="facility" rows="3" class="mt-1 block w-full border border-gray-300 p-2 rounded" placeholder="e.g., AC, Shower, TV, Bathtub" required></textarea>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Status</label>
            <select name="status" class="mt-1 block w-full border border-gray-300 p-2 rounded" required>
                <option value="Available">Available</option>
                <option value="Booked">Booked</option>
                <option value="Reserved">Reserved</option>
                <option value="Waitlist">Waitlist</option>
                <option value="Blocked">Blocked</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save Room
        </button>
    </form>
</div>
@endsection

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
