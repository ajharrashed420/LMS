<div>
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold">Information</h2> 
        <a href="{{route('invoice-show', $invoice->id)}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
</svg>
</a>
    </div>
    <p class="py-2 text-green-800">Customer Name: {{$invoice->user->name}}</p>

    <table class="table-auto w-full">
        <tr>
            <th class="border px-4 py-2 text-left"> Name </th>
            <th class="border px-4 py-2"> Price </th>
            <th class="border px-4 py-2"> Quantity </th>
            <th class="border px-4 py-2 text-right"> Total </th>
        </tr>

        @foreach ($invoice->items as $item)
        <tr>
            <td class="border px-4 py-2">{{$item->name}}</td>
            <td class="border px-4 py-2">${{number_format($item->price, 2)}}</td>
            <td class="border px-4 py-2">{{$item->quantity}}</td>
            <td class="border px-4 py-2 text-right">${{number_format($item->price * $item->quantity, 2)}}
            </td>
            
        </tr>
        
        @endforeach

        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Subtotal</td>
            <td class="border px-4 py-2 text-right font-bold">${{number_format($invoice->amount()['total'],2)}}</td>
        </tr>

        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Paid</td>
            <td class="border px-4 py-2 text-right font-bold text-green-600">- ${{number_format($invoice->amount()['paid'],2)}}</td>
        </tr>

        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Due</td>
            <td class="border px-4 py-2 text-right font-bold text-orange-500">${{number_format($invoice->amount()['due'], 2)}}</td>
        </tr>

    </table>

    
    @if ($enableAddNew)
        <form wire:submit.prevent="saveNewItem">
        <div class="flex gap-2 my-5">
            <div class="mb-6 w-full">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' =>'Enter Name',
            'required' => 'required'
            ])
            </div>
            
            <div class="mb-6 min-w-max">
            @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' =>'Enter Price',
            'required' => 'required'
            ])
            </div>

            <div class="mb-6 min-w-max">
            @include('components.form-field', [
            'name' => 'quantity',
            'label' => 'Quantity',
            'type' => 'number',
            'placeholder' =>'Enter Quantity',
            'required' => 'required'
            ])
            </div>
        </div>
        
        <div class="flex gap-2">
            @include('components.icons.loading-btn')
            <button wire:click="addNewItem" class="lms-button bg-red-600" type="button">Cancel</button>
        </div>
    </form>
    @else
        <button wire:click="addNewItem" class="my-5 lms-button">Add Item</button>
    @endif

    <h2 class="text-xl font-bold">Payments</h2>
    <ul>
        @foreach ($invoice->payments as $payment)
            <li class="py-2">
                <div class="flex items-center gap-2">
                    <p class="text-gray-600">
                        {{ date('F j, Y g:i:a', strtotime($payment->created_at)) }}
                    </p>
                     || 
                    <p class="text-gray-600">
                        ${{ number_format($payment->amount, 2) }}
                    </p>
                    <button wire:click="refund({{$payment->id}})" class="lms-button bg-red-500 py-1" type="button">Refund</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
