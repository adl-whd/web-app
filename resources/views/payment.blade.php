@extends('layouts.app') {{-- Assuming you have a base layout --}}

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <!-- Header -->
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <div class="text-2xl font-bold text-blue-700">Swift Retreat</div>
        <div class="flex space-x-6 text-gray-600">
            <a href="#" class="font-medium">Book A Room</a>
            <a href="#" class="font-medium">My Bookings</a>
            <a href="#" class="font-medium">Shariah Facilities</a>
            <a href="#" class="font-medium">Support</a>
            <div class="w-6 h-6 rounded-full bg-gray-400"></div> <!-- Avatar -->
        </div>
    </div>

    <!-- Booking Details -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-3">Booking Details</h2>
        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-600">VIP Suit</div>
                <div class="text-gray-800 font-bold text-lg">RM 642 <span class="text-sm font-normal text-gray-600">/day</span></div>
                <div class="text-sm text-gray-500 mt-1">4/10 guests</div>
                <div class="text-sm text-gray-500">Features: 1 king bed, 2 single bed, living room, patio, balcony, etc...</div>
                <div class="text-sm text-gray-500 mt-1">Date: 24/3/2025 - 25/3/2025</div>
            </div>
            <div class="flex flex-col items-end">
                <img src="https://via.placeholder.com/100" alt="Room" class="rounded-md mb-2">
                <button class="px-3 py-1 text-sm bg-gray-700 text-white rounded">Details</button>
            </div>
        </div>
    </div>

    <!-- Payment Method -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-3">Payment Method</h2>
        <form method="POST" action="{{ route('payment.process') }}">
            @csrf
            <div class="bg-gray-100 rounded-lg p-4 flex flex-col space-y-4 md:flex-row md:justify-between">
                <!-- Payment Options -->
                <div class="flex flex-col space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="online_banking" class="accent-blue-600">
                        <span>Online Banking</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="e_wallet" class="accent-blue-600">
                        <span>E-Wallet</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="card" class="accent-blue-600">
                        <span>Debit/Credit Card</span>
                    </label>
                </div>

                <!-- Summary -->
                <div class="text-right space-y-1">
                    <div>Subtotal: <strong>RM 642.00</strong></div>
                    <div>Service Tax (8%): <strong>RM 51.36</strong></div>
                    <div>Tourism Tax: <strong>RM 10.00</strong></div>
                    <hr class="my-1">
                    <div class="text-lg font-bold">Total (RM): 703.36</div>
                </div>
            </div>

            <!-- Pay Button -->
            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Pay
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
