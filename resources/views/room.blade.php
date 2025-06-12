@extends('layouts.app')

@section('content')
<div class="container">

<!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
      </div>

      <h2 class="text-xl font-semibold mb-4">Room</h2>

      <!-- Filters -->
      <div class="flex space-x-4 mb-4">
        <a href="{{ route('room') }}"
        class="px-4 py-2 {{ is_null(request('status')) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded-full">
        All Rooms
        </a>

        <a href="{{ route('room', ['status' => 'Available']) }}"
            class="px-4 py-2 {{ request('status') == 'Available' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded-full">
            Available ({{ \App\Models\Room::where('status', 'Available')->count() }})
        </a>

        <a href="{{ route('room', ['status' => 'Booked']) }}"
            class="px-4 py-2 {{ request('status') == 'Booked' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded-full">
            Booked ({{ \App\Models\Room::where('status', 'Booked')->count() }})
        </a>

            <a href="{{ route('room.create') }}" class="ml-auto px-4 py-2 bg-blue-600 text-white rounded-lg">Add room</a>
        </div>

    <!-- Room Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100">
            <tbody>
            <tr>
                <th>Room Number</th>
                <th>Bed Type</th>
                <th>Floor</th>
                <th>Facility</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tbody>
        </thead>
        <tbody>
            @foreach($room as $room)
            <tr>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->bed_type }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->facility }}</td>
                <td>
                    @if($room->status === 'Available')
                        <span class="badge bg-success">{{ $room->status }}</span>
                    @elseif($room->status === 'Booked')
                        <span class="badge bg-danger">{{ $room->status }}</span>
                    @elseif($room->status === 'Reserved')
                        <span class="badge bg-primary">{{ $room->status }}</span>
                    @elseif($room->status === 'Waitlist')
                        <span class="badge bg-warning text-dark">{{ $room->status }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $room->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('room.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('room.destroy', $room->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $room->links() }} --}}
    {{-- {{ $room->appends(['status' => request('status')])->links() }} --}}
</div>
@endsection

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
