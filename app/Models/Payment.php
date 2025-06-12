<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
    //'transaction_ref',
    'amount',
    'method',
    'card_name',
    'card_last_four',
    'expiry_month',
    'expiry_year',
    'status'
];
    public function booking()
{
    return $this->hasOne(Booking::class);
}

}
