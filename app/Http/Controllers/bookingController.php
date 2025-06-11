<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use Illuminate\Support\Facades\DB;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'room_type' => 'required',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'adult' => 'required|integer|min:1',
        'children' => 'integer|min:0',
        'first_name' => 'required|string',
        'phone_no' => 'required|string'
    ]);

    $roomNo = substr(strtoupper($validated['room_type']), 0, 3) . rand(100, 999);

        $booking = new booking();
        $booking->room_type = $validated['room_type'];
        $booking->room_no = $roomNo;
        $booking->check_in = $validated['check_in'];
        $booking->check_out = $validated['check_out'];
        $booking->adult = $validated['adult'];
        $booking->children = $validated['children'] ?? 0;
        $booking->first_name = $validated['first_name'];
        $booking->phone_no = $validated['phone_no'];
        $booking->created_at = now();
        $booking->updated_at = now();

        $booking->save();

    return redirect('payment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
