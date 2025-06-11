<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facility = Facility::all();
        return view('facility', compact('facility'));
    }

    public function create()
    {
        return view('facility.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required',
            'prayer_room' => 'boolean',
            'halal_dining' => 'boolean',
            'family_friendly' => 'boolean',
        ]);

        Facility::create($validated);
        return redirect()->route('facility');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('facility.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'room_number' => 'required',
            'prayer_room' => 'boolean',
            'halal_dining' => 'boolean',
            'family_friendly' => 'boolean',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->update($validated);
        return redirect()->route('facility');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->route('facility');
    }
}
