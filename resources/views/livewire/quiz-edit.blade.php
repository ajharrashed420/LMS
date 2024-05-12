<div>
    <h2 class="font-bold mb-4">Questions of <span class="text-red-500">{{$quiz->name}}</span></h2>
   
        <table class="w-full table-auto mb-4">
            <tr> 
                <th class="border px-4 py-2 text-left bg-green-600 text-white">Name</th>
                <th class="border px-4 py-2  bg-green-600 text-white w-10">Actions</th>
            </tr>

                @foreach ($quiz_questions->questions as $item)
                <tr>
                    <td class="border px-4 py-2"> {{$item->name}} </td>
                    <td class="border px-4 py-2 text-center w-10"> 
                        <div class="flex justify-center">
                            <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="questionDelete({{$item->id}})">
                                <button  type="submit"> @include('components.icons.trash')</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
   


    <h2 class="font-bold mb-4">Add Question</h2>
    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question_id" class="lms-label">Question</label>
            
            <select class="lms-input" wire:model="question_id" id="question_id">
                <option value="">Select a Question</option>
                @foreach ($questions as $question)
                    <option value="{{$question->id}}"> {{$question->name}} </option>
                @endforeach
            </select>
        </div>

        @include('components.icons.loading-btn')
    </form>
</div>
