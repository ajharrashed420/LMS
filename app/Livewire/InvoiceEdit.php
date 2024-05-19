<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use App\Models\InvoiceItem;

class InvoiceEdit extends Component
{
    public $invoice_id;
    public $invoice;
    public $enableAddNew = false;

    public $name;
    public $price;
    public $quantity;

    public $totalPrice;


    public function mount() {
        $this->invoice = Invoice::findOrFail($this->invoice_id);
    }
    public function render()
    {   

        return view('livewire.invoice-edit');
    }

    public function addNewItem() {
        $this->enableAddNew = !$this->enableAddNew;
    }

    public function saveNewItem() {
        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id
        ]);

        flash()->addSuccess('New invoice added!');

        return redirect()->route('invoice-edit', $this->invoice_id);
    }
}
