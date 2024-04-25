<form wire:submit.prevent="submitForm">
    <div class="flex gap-2">
            <div class="mb-4 flex-1">
                <label class="lms-label">Name </label>
                <input wire:model="name" type="text" class="lms-input">

                @error('name')
                    <div class="text-red-500 text-sm"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-4  flex-1">
                <label class="lms-label">Email </label>
                <input wire:model="email" type="email" class="lms-input">

                @error('email')
                    <div class="text-red-500 text-sm"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-4  flex-1">
                <label class="lms-label">Password </label>
                <input wire:model="password" type="password" class="lms-input">

                @error('password')
                    <div class="text-red-500 text-sm"> {{$message}} </div>
                @enderror
            </div>
            
        </div>
        <select wire:model="role"> 
                <option value=""> Select Role</option>
            @foreach ($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error('role')
            <div class="text-red-500 text-sm"> {{$message}} </div>
        @enderror


        @include('components.icons.loading-btn')
</form>
