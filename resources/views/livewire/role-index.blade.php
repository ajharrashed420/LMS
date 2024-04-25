<div>
    <table class="w-full table-auto ">
        <tr> 
            <th class="border px-4 py-2 text-left bg-green-600 text-white">Name</th>
            <th class="border px-4 py-2 text-left  bg-green-600 text-white">Permissions</th>
            <th class="border px-4 py-2  bg-green-600 text-white">Actions</th>
        </tr>

        @foreach ($roles as $role)
            <tr>
                <td class="border px-4 py-2"> {{$role->name}} </td>
                <td class="border px-4 py-2"> 
                    @foreach ($role->permissions as $permission)
                        <span class="bg-green-500 text-white rounded px-2 py-1">{{$permission->name}}</span>
                    @endforeach 
                </td>
                <td class="border px-4 py-2 text-center"> 
                    
                    <div class="flex justify-center gap-5">
                        <a href="{{route('role.edit', $role->id)}}">
                        @include('components.icons.edit')
                        </a>

                        <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="roleDelete({{$role->id}})">
                            <button  type="submit"> @include('components.icons.trash')</button>
                        </form>
                    </div>
                
                </td>
            </tr>
        @endforeach

    </table>
</div>
