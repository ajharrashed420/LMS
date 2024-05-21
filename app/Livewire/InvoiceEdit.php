<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\Payment;
use Livewire\Component;
use Stripe\StripeClient;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Validator;

class InvoiceEdit extends Component
{
    public $invoice_id;
    public $invoice;
    public $enableAddNew = false;

    public $name;
    public $price;
    public $quantity;

    public $totalPrice;

    public $payment;

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

    public function refund($id) {
        $this->payment = Payment::where('id', $id)->first();

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        
        if (!$this->payment) {
            
            return response()->json(['error' => 'Payment not found.'], 404);
        }
        try {
            // Create the refund
            $refund = $stripe->refunds->create([
                'payment_intent' => $this->payment->stripe_payment_intent_id,
                'amount' => $this->payment->amount,
            ]);

            
            // Update the payment record to reflect the refund
            $this->payment->delete();

            flash()->addSuccess('Refund processed successfully.');
            return redirect()->route('invoice-edit', $this->invoice_id);

        } catch (\Exception $e) {
            flash()->addWarning('Refund error.');
            return redirect()->route('invoice-edit', $this->invoice_id);
        }
    }



}
