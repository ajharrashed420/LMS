<div>
    <table class="w-full table-auto mb-4">
    <tr> 
        <th class="border px-4 py-2 text-left bg-green-600 text-white">Name</th>
        <th class="border px-4 py-2  bg-green-600 text-white w-10">Actions</th>
    </tr>

        @foreach ($questions as $item)
        <tr>
            <td class="border px-4 py-2"> {{$item->name}} </td>
            <td class="border px-4 py-2 text-center w-10"> 
                <div class="flex justify-center gap-5">
                    <a href="{{route('question.edit', $item->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="deleteQuestion({{$item->id}})">
                        <button  type="submit"> @include('components.icons.trash')</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
</div>
