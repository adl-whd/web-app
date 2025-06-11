<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'room_number',
        'total_amount',
        'status'
    ];
}
// This model represents a guest in the hotel management system, with fields for name, room number, total amount, and status.
