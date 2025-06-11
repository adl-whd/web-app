<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $room = Room::paginate(10); // or ->get()
        return view('room.index', compact('room'));
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:room',
            'bed_type' => 'required',
            'floor' => 'required',
            'facility' => 'required',
            'status' => 'required',
        ]);

        Room::create($request->all());
        return redirect()->route('room.index')->with('success', 'Room added successfully.');
    }

    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'bed_type' => 'required',
            'floor' => 'required',
            'facility' => 'required',
            'status' => 'required',
        ]);

        $room->update($request->all());
        return redirect()->route('room.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully.');
    }
}
