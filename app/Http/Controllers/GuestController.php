<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guest', compact('guests'));
    }

    public function store(Request $request)
    {
        $lastGuest = Guest::latest('id')->first();
        $nextNumber = $lastGuest ? (int)substr($lastGuest->guest_id, 2) + 1 : 1;
        $guestId = 'G-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Guest::create([
            'guest_id' => $guestId,
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'booking_date' => $request->booking_date,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);

        $guest->update([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'booking_date' => $request->booking_date,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()->back();
    }
}
