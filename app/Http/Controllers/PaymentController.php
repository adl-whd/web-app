<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Show payment form
    public function index()
    {
        return view('payment'); // resources/views/payment.blade.php
    }

    // Handle payment submission
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        $payment = Payment::create([
            'user_id' => auth()->id(),
            'amount' => 703.36, // Example amount
            'method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.show', $payment->id)->with('success', 'Payment initiated successfully!');
    }

    // Show payment details
    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }
}
