<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class InvoiceIndex extends Component
{
    public function render()
    {   
        $invoices = Invoice::paginate(40);
        return view('livewire.invoice-index', [
            'invoices' => $invoices
        ]);
    }
}
