<div>
    <form wire:submit.prevent="formSubmit">

        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' =>'Enter Name',
            'required' => ''
        ])
        </div>


        @include('components.icons.loading-btn')
    </form>


    <h2 class="text-xl font-bold text-gray-700 mt-10 mb-3">Notes</h2>
    <div>
        <ul class="flex divide-y flex-col px-4">
            @foreach ($class->notes as $note)
                <li type="1" class="px-2 py-3">{{ $note->description }}</li>
            @endforeach   
        </ul>
        
    </div>

    <form wire:submit.prevent="addNote">
        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'note',
            'label' => 'Note',
            'type' => 'textarea',
            'placeholder' =>'Type note',
            'required' => ''
        ])
        </div>
        @include('components.icons.loading-btn')
    </form>


</div>