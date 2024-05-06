    <label class="lms-label" for="{{$name}}">{{$label}} </label>
    
    @if ($type === 'textarea')
        <textarea wire:model.lazy="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} > </textarea>
    @else
        <input wire:model.lazy="{{$name}}" id="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$required}} class="lms-input">
    @endif
    

    @error($name)
        <div class="text-red-500 text-sm"> {{$message}} </div>
    @enderror