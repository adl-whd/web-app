<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Show payment form
    public function index()
    {
        // Example booking details - you might want to pass these from a booking system
        $bookingDetails = [
            'hotel_name' => 'Grand Hotel',
            'room_type' => 'Deluxe Room',
            'check_in' => 'June 15, 2024',
            'check_out' => 'June 20, 2024',
            'guests' => '2 Adults, 1 Child',
            'room_price' => 1250.00,
            'taxes' => 125.00,
            'total' => 1375.00
        ];

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

        // In a real application, you would process the payment here
        // For demo purposes, we'll just create a record

        $payment = Payment::create([
            'user_id' => auth()->id() ?? null, // null if not authenticated
            'amount' => $request->input('total_amount', 1375.00),
            'method' => 'Credit Card',
            'card_last_four' => substr($request->card_number, -4),
            'status' => 'completed',
        ]);

        // Return JSON response for AJAX handling
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Payment successful!',
                'payment_id' => $payment->id
            ]);
        }

        return redirect()->route('payment.success', $payment->id);
    }

    // Show success page
    public function success($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.success', compact('payment'));
    }
}
