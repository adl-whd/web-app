<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('facilities.create');
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
        return redirect()->route('facilities.index');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('facilities.edit', compact('facility'));
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
        return redirect()->route('facilities.index');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->route('facilities.index');
    }
}
