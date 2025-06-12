@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Room</h1>

    <form method="POST" action="{{ route('room.update', $room->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Room Number</label>
            <input type="text" name="room_number" value="{{ $room->room_number }}" class="w-full border p-2 rounded">
        </div>

        <!-- Add other fields here: bed_type, room_type, floor, etc. -->

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Room
        </button>
    </form>
</div>
@endsection
