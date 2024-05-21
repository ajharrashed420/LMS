<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'invoice_id',
        'stripe_payment_intent_id',
        'stripe_charge_id',
        'refund_id',
        'refunded',
    ];
}
