<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class DashboardController extends Controller
{
    public function index()
    {
        $guest = Guest::Guest::all(); // Adjust per page as needed
        return view('dashboard', compact('guest'));
    }
}

// This controller handles the dashboard functionality, including displaying a paginated list of guests.

