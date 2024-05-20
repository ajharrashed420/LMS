<div>
    <h2 class="text-xl font-semibold">Information</h2>
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
                </div>
            </li>
        @endforeach
    </ul>
</div>
