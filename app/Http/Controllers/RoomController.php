<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $room = Room::paginate(10); // or ->get()
        return view('room', compact('room'));
        return view('room', ['room' => $room]);



    }

    public function create()
    {
        return view('room.create');

    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'room_number' => 'required|unique:rooms',
        'bed_type'    => 'required',
        'floor'       => 'required',
        'facility'    => 'required',
        'status'      => 'required',
    ]);

    $request->validate([
        'room_number' => 'required',
        'bed_type' => 'required',
        'floor' => 'required',
        'facility' => 'required',
        'status' => 'required',
    ]);

    Room::create([
        'room_number' => $request->room_number,
        'bed_type' => $request->bed_type,
        'floor' => $request->floor,
        'facility' => $request->facility,
        'status' => $request->status,
    ]);

    Room::create($validated);
    return redirect('/room')->with('success', 'Room created successfully!');
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
        return redirect()->route('room')->with('success', 'Room updated successfully.');
        
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room')->with('success', 'Room deleted successfully.');
    }
}
