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
    $bookingDetails = session('bookingDetails');

    if (!$bookingDetails) {
        return redirect()->back()->with('error', 'No booking found.');
    }

    return view('payment', compact('bookingDetails'));
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

    // Calculate total amount (example calculation)
    $roomPrices = [
        'Deluxe-Room' => 199,
        'Executive-Suite' => 349,
        'Presidential-Suite' => 599
    ];

    $nights = (strtotime($validated['check_out']) - strtotime($validated['check_in'])) / (60 * 60 * 24);
    $subtotal = $roomPrices[$validated['room_type']] * $nights;
    $tax = $subtotal * 0.1; // 10% tax
    $total = $subtotal + $tax;

    $bookingDetails = [
        'has_booking' => true,
        'hotel_name' => 'Swift Retreat',
        'room_type' => $validated['room_type'],
        'check_in' => $validated['check_in'],
        'check_out' => $validated['check_out'],
        'guests' => $validated['adult'] . ' Adults' . ($validated['children'] > 0 ? ', ' . $validated['children'] . ' Children' : ''),
        'room_price' => $roomPrices[$validated['room_type']],
        'nights' => $nights,
        'subtotal' => $subtotal,
        'taxes' => $tax,
        'total' => $total
    ];

session(['bookingDetails' => $bookingDetails]);
return redirect()->route('payment.index'); // point to index()
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
