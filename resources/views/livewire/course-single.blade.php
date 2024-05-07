<div>
    <div class="flex items-center justify-between font-semibold text-2xl mb-6">
        <h2 class="underline">{{$course->name}}</h2>
        
        <img src="{{$course->image}}" alt="{{$course->name}}" width="30px" height="30px" class="rounded-full overflow-hidden">
    </div>

    <h2 class="font-semibold text-green-600 mb-3">Price: ${{$course->price}}</h2>

    <p class="mb-6">{{$course->description}}</p>

    <h2 class="font-bold text-2xl mb-3">Class List</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="px-4 py-2 text-left border">Name</th>
            <th class="px-4 py-2 border text-center">Actions</th>
        </tr>

        @foreach ($course->curriculums as $class)
        <tr>
            <td class="border px-4 py-2">
            {{$class->name}}
            </td>
            <td class="border px-4 py-2 text-center">
                <div class="flex gap-2 justify-center">
                    <a class="inline-block bg-green-600 rounded py-1 px-2 text-white" href="{{route('curriculum.show', $class->id)}}">@include('components.icons.eye')</a>
                    <a class="inline-block bg-blue-600 rounded py-1 px-2 text-white" href="{{route('curriculum.edit', $class->id)}}">@include('components.icons.edit')</a>
                    <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="classDelete({{$class->id}})">
                            <button class="bg-red-600 rounded py-1 px-2 text-white" type="submit"> @include('components.icons.trash')</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach

    </table>
    
</div>
