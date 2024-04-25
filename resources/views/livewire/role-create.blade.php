<form wire:submit.prevent='formSubmit'>
    <label class="lms-label" for="name">Name </label>
    <input wire:model="name" id="name" type="text" class="lms-input">

    @error('name')
        <div class="text-red-500 text-sm"> {{$message}} </div>
    @enderror
   
    <h3 class="font-semibold mt-5">Permissions</h3>



    <div class="flex flex-wrap">
        @foreach ($permissions as $permission)
        <div class="w-1/3 px-4 mb-4">
            <label class="inline-flex items-center">
                <input wire:model="selectedPermissions" type="checkbox" class="form-checkbox" value="{{$permission->name}}">
                <span class="ml-2">{{$permission->name}}</span>
            </label>
        </div>
        @endforeach
    </div>
    @error('selectedPermissions')
        <div class="text-red-500 text-sm"> {{$message}} </div>
    @enderror

    @include('components.icons.loading-btn')
</form>



