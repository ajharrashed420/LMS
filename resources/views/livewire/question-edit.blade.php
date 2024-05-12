<form wire:submit.prevent="submitForm">
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'name',
        'label' => 'Question Name',
        'type' => 'text',
        'placeholder' =>'Enter Question Name',
        'required' => 'required'
    ])
    </div>

    @foreach ($answer as $ans)
        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'answer_'.$ans,
            'label' => 'Answer '.ucfirst($ans),
            'type' => 'text',
            'placeholder' =>'Enter Answer '.ucfirst($ans),
            'required' => 'required'
        ])
        </div>
    @endforeach

    <div class="mb-6">
        <label class="lms-label" for="correct">Correct Answer</label>
        <select wire:model="correct_answer" class="lms-input" id="correct">
            @foreach ($answer as $ans)
                <option value="{{$ans}}">{{ucfirst($ans)}}</option>
            @endforeach
        </select>
    </div>
    
     @include('components.icons.loading-btn')
</form>
