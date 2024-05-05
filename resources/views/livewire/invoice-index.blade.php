<div>
    <table class="w-full table-auto ">
        <tr> 
            <th class="border px-4 py-2 text-left bg-green-600 text-white">Id</th>
            <th class="border px-4 py-2 text-left  bg-green-600 text-white">User</th>
            <th class="border px-4 py-2 text-left  bg-green-600 text-white">Due Date</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Amount</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Paid</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Due</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Actions</th>
        </tr>

        @foreach ($invoices as $item)
            <tr>
                <td class="border px-4 py-2"> {{$item->id}} </td>
                <td class="border px-4 py-2"> {{$item->user->name}} </td>
                <td class="border px-4 py-2"> {{date('F j, Y', strtotime($item->due_date))}} </td>
                <td class="border px-4 py-2 text-center">${{$item->amount()['total']}} </td>
                <td class="border px-4 py-2 text-center">${{$item->amount()['paid']}} </td>
                <td class="border px-4 py-2 text-center">${{$item->amount()['due']}} </td>
                <td class="border px-4 py-2 text-center"> 
                    
                    <div class="flex justify-center gap-4">
                        <a href="">
                        @include('components.icons.edit')
                        </a>

                        <a href="{{route('invoice-show', $item->id)}}">
                        @include('components.icons.eye')
                        </a>


                        <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="invoiceDelete({{$item->id}})">
                            <button  type="submit"> @include('components.icons.trash')</button>
                        </form>
                    </div>
                
                </td>
            </tr>
        @endforeach

    </table>

    <div class="mt-4">
        {{$invoices->links()}}
    </div>
</div>
