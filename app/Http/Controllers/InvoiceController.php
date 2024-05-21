<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function index() {
        return view('invoice.index');
    }

    public function edit(string $id) {
        return view('invoice.edit', [
            'invoice' => Invoice::findOrFail($id)
        ]);
    }

    public function show(string $id) {

        $DBinvoice = Invoice::findOrFail($id);

        $customer = new Buyer([
            'name'   => $DBinvoice->user->name,
            'custom_fields' => [
                'email' => $DBinvoice->user->email,
            ],
        ]);
    
        $items = [];

        foreach ($DBinvoice->items as $item) {
            $items[] = InvoiceItem::make($item->name)->pricePerUnit($item->price);
        }


        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($customer)
            ->addItems($items)
            ->currencySymbol('$')
            ->currencyCode('USD');

        return $invoice->stream();
    }

}
