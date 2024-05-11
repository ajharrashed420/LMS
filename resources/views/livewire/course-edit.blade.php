<form wire:submit.prevent="formSubmit">

    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' =>'Enter Name',
        'required' => 'required'
    ])
    </div>


    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'description',
        'label' => 'Description',
        'type' => 'textarea',
        'placeholder' =>'Enter Course Description',
        'required' => 'required'
    ])
    </div>


    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'price',
        'label' => 'Price',
        'type' => 'number',
        'placeholder' =>'Add Price',
        'required' => 'required'
    ])
    </div>

    <div class="mb-6 flex items-center">
        <div class="w-full gap-4">
            <label for="days" class="lms-label">Days</label>
            <div class="flex flex-wrap -mx-4">
                @foreach ($days as $day)
                    <div class="min-w-max px-4 flex items-center gap-2">
                        <input wire:model.lazy="selectedDays" type="checkbox" value="{{$day}}" id="{{$day}}"> <label for="{{$day}}">{{ucfirst($day)}}</label>
                    </div>
                @endforeach
                
            </div>
        </div>

        <div class="min-w-max mr-4">
            @include('components.form-field', [
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' =>'Select Time',
                'required' => 'required'
            ])
        </div>

        <div class="min-w-max">
            @include('components.form-field', [
                'name' => 'end_date',
                'label' => 'End Date',
                'type' => 'date',
                'placeholder' =>'End Date',
                'required' => 'required'
            ])
        </div>
    </div>

    @include('components.icons.loading-btn')
</form>