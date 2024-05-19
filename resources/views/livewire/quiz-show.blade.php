<div>
    @foreach ($quiz->questions as $question)
        <h2 class="font-bold text-xl"> {{$question->name}} </h2>
 
        <div class="flex items-center gap-2  @if (array_key_exists($question->id, $answered)) bg-{{$answered[$question->id] ? 'green':'red'}}-200 @endif px-5 py-2 rounded">
            @foreach ($question_options as $qu)
                <input wire:model="answer" wire:change.prevent="check" value="{{$qu}},{{$question->id}}" type="radio" id="{{$qu}}{{$question->id}}" @if (array_key_exists($question->id, $answered)) disabled @endif > <label for="{{$qu}}{{$question->id}}">{{ $question->$qu }}</label>
            @endforeach
        </div>
    @endforeach
</div>
