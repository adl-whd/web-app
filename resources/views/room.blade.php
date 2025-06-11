@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Room Management</h1>
    <a href="{{ route('room.create') }}" class="btn btn-primary mb-3">Add Room</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Bed Type</th>
                <th>Floor</th>
                <th>Facility</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
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
    {{ $room->links() }}
</div>
@endsection
