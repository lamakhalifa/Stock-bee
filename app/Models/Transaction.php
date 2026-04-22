<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'charge_id',
        'amount',
        'currency',
        'payment_method',
        'card_id',
        'status',
        'gateway_response'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
