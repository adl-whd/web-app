<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'amount',
        'method',
        'status',
        'card_last_four',
        'created_at',
        'updated_at'
    ];
}
