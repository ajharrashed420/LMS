<div>
    @foreach ($quiz->questions as $question)
        <h2 class="font-bold text-xl"> {{$question->name}} </h2>
        <div class="flex items-center gap-2">
            <input wire:model="answer" wire:change.prevent="check" value="a,{{$question->id}}" type="radio" id="answer_a{{$question->id}}"> <label for="answer_a{{$question->id}}">{{$question->answer_a}}</label>
            <input wire:model="answer" wire:change.prevent="check" value="b,{{$question->id}}" type="radio" id="answer_b{{$question->id}}"> <label for="answer_b{{$question->id}}">{{$question->answer_b}}</label>
            <input wire:model="answer" wire:change.prevent="check" value="c,{{$question->id}}" type="radio" id="answer_c{{$question->id}}"> <label for="answer_c{{$question->id}}">{{$question->answer_c}}</label>
            <input wire:model="answer" wire:change.prevent="check" value="d,{{$question->id}}" type="radio" id="answer_d{{$question->id}}"> <label for="answer_d{{$question->id}}">{{$question->answer_d}}</label>
        </div>
    @endforeach
</div>
