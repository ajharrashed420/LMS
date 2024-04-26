<?php

namespace App\Models;

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
}
