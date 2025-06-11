<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'room_type',
        'room_no',
        'check_in',
        'check_out',
        'adult',
        'children',
        'first_name',
        'phone_no',
        'created_at',
        'updated_at'
    ];
}
