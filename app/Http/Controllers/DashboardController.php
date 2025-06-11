<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fake data (replace with DB queries in real app)
        return view('dashboard', [
            'checkIns' => 23,
            'checkOuts' => 13,
            'totalGuests' => 60,
            'bookingsToday' => 12,
            'availableRooms' => 24,
            'revenueToday' => 3240,
            'prayerRequests' => 8,
            'rooms' => [
                ['type' => 'Single sharing', 'occupied' => 2, 'total' => 30, 'price' => 568],
                ['type' => 'Double sharing', 'occupied' => 2, 'total' => 35, 'price' => 1068],
                ['type' => 'Triple sharing', 'occupied' => 2, 'total' => 25, 'price' => 1568],
                ['type' => 'VIP Suit', 'occupied' => 4, 'total' => 10, 'price' => 2568],
            ],
            'roomStatus' => [
                'occupied' => 104,
                'clean' => 90,
                'dirty' => 4,
                'inspected' => 60,
                'available_clean' => 30,
                'available_dirty' => 19,
                'available_inspected' => 30,
            ],
            'floorStatus' => 80,
            'statistics' => [65, 75, 80, 95, 90, 70, 85, 95, 100, 90],
            'feedbacks' => [
                ['name' => 'Mark', 'message' => 'Food could be better.', 'room' => 'A201'],
                ['name' => 'Christian', 'message' => 'Facilities are not enough.', 'room' => 'A101'],
                ['name' => 'Alexander', 'message' => 'Room cleaning could be better.', 'room' => 'A301'],
            ]
        ]);
    }
}


