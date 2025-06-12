<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'full_name',
        'username',
        'email',
        'phone_number',
        'password',
        'booking_date',
        'check_in_date',
        'check_out_date',
        'payment_status',
    ];
}
