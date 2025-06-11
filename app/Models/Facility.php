<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id','room_number', 'prayer_room', 'halal_dining', 'family_friendly', 'status'];
}
