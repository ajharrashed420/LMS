<div>
    <table class="w-full table-auto">
        <tr> 
            <th class="border px-4 py-2 text-left bg-green-600 text-white">Name</th>
            <th class="border px-4 py-2 text-left  bg-green-600 text-white">Email</th>
            <th class="border px-4 py-2 text-left  bg-green-600 text-white">Phone</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Registred</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Actions</th>
        </tr>

        @foreach ($lead as $item)
            <tr>
                <td class="border px-4 py-2"> {{$item->name}} </td>
                <td class="border px-4 py-2"> {{$item->email}} </td>
                <td class="border px-4 py-2"> {{$item->phone}} </td>
                <td class="border px-4 py-2 text-center"> {{date('F j, Y', strtotime($item->created_at))}} </td>
                <td class="border px-4 py-2 text-center"> 
                    
                    <div class="flex justify-center">
                        <a href="{{route('lead.edit', $item->id)}}">
                        @include('components.icons.edit')
                        </a>

                        <a class="px-3" href="{{route('lead.edit', $item->id)}}">
                            @include('components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="leadDelete({{$item->id}})">
                            <button  type="submit"> @include('components.icons.trash')</button>
                        </form>
                    </div>
                
                </td>
            </tr>
        @endforeach

    </table>

    <div class="mt-4">
        {{$lead->links()}}
    </div>
</div>
