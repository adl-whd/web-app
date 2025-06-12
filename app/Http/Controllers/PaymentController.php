<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking; // ADD THIS at the top with your other use statements

class PaymentController extends Controller
{
    // Show payment form

    public function index(Request $request)
{
    $bookingDetails = [
        'has_booking' => false,
        'id' => null,
        'total' => 0
    ];

    // If booking info is passed via query or session
    if ($request->has('booking_id')) {
        $booking = Booking::find($request->input('booking_id'));

        if ($booking) {
            $bookingDetails = [
                'has_booking' => true,
                'id' => $booking->id,
                'total' => $booking->total_price,
                'check_in' => $booking->check_in,
                'check_out' => $booking->check_out,
                'guests' => $booking->guests
            ];
        }
    }

    return view('payment', compact('bookingDetails'));
}

    // Handle payment submission
    public function store(Request $request)
{
    $validated = $request->validate([
        'card_name' => 'required|string|max:255',
        'card_number' => 'required|string|size:16',
        'expiry_month' => 'required|numeric|between:1,12',
        'expiry_year' => 'required|numeric|min:' . date('Y'),
        'cvv' => 'required|numeric|digits_between:3,4',
    ]);

    try {
        // 1. Create payment
        $payment = Payment::create([
            'amount' => $request->input('total_amount', 1375.00),
            'method' => 'Credit Card',
            'card_last_four' => substr($request->card_number, -4),
            'status' => 'completed',
        ]);

        // 2. Link payment to booking
        if ($request->input('has_booking') == 1 && $request->has('booking_id')) {
            $bookingId = $request->input('booking_id');
            Booking::where('id', $bookingId)->update([
                'payment_id' => $payment->id
            ]);
        }

        // 3. Response (AJAX or redirect)
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Payment successful!',
                'payment_id' => $payment->id,
                'has_booking' => $request->input('has_booking') == 1
            ]);
        }

        return redirect()->route('payment.success', $payment->id);

    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}

    // Show success page
    public function success($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.success', compact(''));
    }


}
