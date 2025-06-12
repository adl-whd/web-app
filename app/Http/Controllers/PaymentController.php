<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;

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
            'total_amount' => 'required|numeric',
            'has_booking' => 'sometimes|boolean',
            'booking_id' => 'sometimes|nullable|exists:bookings,id'
        ]);

        try {
            // Generate a transaction reference
            $transactionRef = 'PAY-' . strtoupper(substr($validated['card_name'], 0, 3)) . '-' . time();

            // Create payment record
            $payment = new Payment();
            $payment->transaction_ref = $transactionRef;
            $payment->amount = $validated['total_amount'];
            $payment->method = 'Credit Card';
            $payment->card_name = $validated['card_name'];
            $payment->card_last_four = substr($validated['card_number'], -4);
            $payment->expiry_month = $validated['expiry_month'];
            $payment->expiry_year = $validated['expiry_year'];
            $payment->status = 'completed';
            $payment->created_at = now();
            $payment->updated_at = now();
            $payment->save();

            // Link payment to booking if applicable
            if ($validated['has_booking'] && $validated['booking_id']) {
                $booking = Booking::find($validated['booking_id']);
                if ($booking) {
                    $booking->payment_id = $payment->id;
                    $booking->status = 'confirmed'; // Update booking status
                    $booking->updated_at = now();
                    $booking->save();
                }
            }

            // Response (AJAX or redirect)
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment successful!',
                    'payment_id' => $payment->id,
                    'transaction_ref' => $transactionRef,
                    'has_booking' => $validated['has_booking']
                ]);
            }

            return redirect()->route('payment.success', [
                'id' => $payment->id,
                'transaction_ref' => $transactionRef
            ]);

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
