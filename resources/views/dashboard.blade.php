
@extends('layouts.app') {{-- or whatever layout you use --}}


@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create booking</button>
    </div>

    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        <strong>System Status:</strong> All Services Operational
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">Today's Check-in: <strong>{{ $checkIns }}</strong></div>
        <div class="bg-white p-4 rounded shadow">Today's Check-out: <strong>{{ $checkOuts }}</strong></div>
        <div class="bg-white p-4 rounded shadow">Total in Hotel: <strong>{{ $totalGuests }}</strong></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">Today's Bookings: <strong>{{ $bookingsToday }}</strong></div>
        <div class="bg-white p-4 rounded shadow">Available Rooms: <strong>{{ $availableRooms }}</strong></div>
        <div class="bg-white p-4 rounded shadow">Today's Revenue: <strong>RM {{ number_format($revenueToday) }}</strong></div>
        <div class="bg-white p-4 rounded shadow">Prayer Requests: <strong>{{ $prayerRequests }}</strong></div>
    </div>

    <h2 class="text-lg font-semibold mb-2">Rooms</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        @foreach ($rooms as $room)
            <div class="bg-white p-4 rounded shadow">
                <div class="text-sm">{{ $room['type'] }}</div>
                <div class="text-xs text-gray-500">{{ $room['occupied'] }}/{{ $room['total'] }}</div>
                <div class="text-blue-600 font-bold mt-2">RM {{ number_format($room['price']) }}/day</div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Room Status</h3>
            <ul class="text-sm space-y-1">
                <li>Occupied: {{ $roomStatus['occupied'] }}</li>
                <li>Clean: {{ $roomStatus['clean'] }}</li>
                <li>Dirty: {{ $roomStatus['dirty'] }}</li>
                <li>Inspected: {{ $roomStatus['inspected'] }}</li>
            </ul>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Floor Status</h3>
            <div class="text-4xl text-blue-600">{{ $floorStatus }}%</div>
            <div class="text-sm text-gray-500">Completed</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Feedback</h3>
            @foreach ($feedbacks as $fb)
                <div class="text-sm border-b pb-2 mb-2">
                    <strong>{{ $fb['name'] }}</strong> ({{ $fb['room'] }})<br>
                    <span class="text-gray-500">{{ $fb['message'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Placeholder for statistics chart --}}
    <div class="bg-white p-4 rounded shadow">
        <h3 class="font-semibold mb-2">Occupancy Statistics</h3>
        <p class="text-sm text-gray-500">[Insert chart here with Laravel charting library or Livewire]</p>
    </div>
</div>
@endsection
