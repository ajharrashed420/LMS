<div>
    <form wire:submit.pervent="submitForm">
    
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
                <input wire:model="email" type="text" class="lms-input">

                @error('email')
                    <div class="text-red-500 text-sm"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-4  flex-1">
                <label class="lms-label">Phone </label>
                <input wire:model="phone" type="text" class="lms-input">

                @error('phone')
                    <div class="text-red-500 text-sm"> {{$message}} </div>
                @enderror
            </div>
            
        </div>
        @include('components.icons.loading-btn')


    </form>


    <h2 class="text-xl font-bold text-gray-700 mt-10">Notes</h2>
    <div>
        <ul class="flex divide-y flex-col px-4">
            @foreach ($notes as $note)
                <li type="1" class="px-2 py-3">{{ $note->description }}</li>
            @endforeach   
        </ul>
        
    </div>

    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Enter your note"></textarea>
        </div>
        <button type="submit" class="lms-button">Save</button>
    </form>
    
</div>