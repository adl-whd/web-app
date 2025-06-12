<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Show payment form
    public function index()
{
    // Default empty booking details
    $bookingDetails = [
        'has_booking' => false,
        'total' => 0
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

    $paymentData = [
        'amount' => $request->input('total_amount', 0),
        'method' => 'Credit Card',
        'status' => 'completed',
        'card_last_four' => substr($request->card_number, -4),
        'first_name' => $request->input('first_name', 'Guest') // Add default or get from form
    ];

    // Only add user_id if authenticated
    if (auth()->check()) {
        $paymentData['user_id'] = auth()->id();
    }

    try {
        $payment = Payment::create($paymentData);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Payment successful!',
                'payment_id' => $payment->id
            ]);
        }

        return redirect()->route('payment.success', $payment->id);
    } catch (\Exception $e) {
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage()
            ], 500);
        }
        return back()->with('error', 'Payment failed: ' . $e->getMessage());
    }
}

    // Show success page
    public function success($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.success', compact('payment'));
    }
}
