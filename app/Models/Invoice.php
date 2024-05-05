<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'due_date',
        'paid_date',
        'user_id',
    ];

    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function amount(){
    
        
        $amounts = [
            'total' => 0,
            'paid' => 0,
            'due' => 0,
        ];

        foreach ($this->items as $item) {
            $amounts['total'] += $item->price * $item->quantity;
        }

        foreach ($this->payments  as $payment) {
            $amounts['paid'] += $payment->amount;
        }

        $amounts['due'] = $amounts['total'] - $amounts['paid'];

        return $amounts;
    }
}
