<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{route('quiz.store')}}" method="POST"> @csrf
                        <label class="lms-label" for="name">Quiz name</label>
                        <input class="lms-input" name="name" id="name" type="text">
                        <button type="submit" class="lms-button">Add Quiz</button>
                    </form>

                    <table class="w-full table-auto mt-10">
                        <tr> 
                            <th class="border px-4 py-2 text-left bg-green-600 text-white">Name</th>
                            <th class="border px-4 py-2  bg-green-600 text-white w-10">Actions</th>
                        </tr>

                        @foreach ($quiz as $item)
                            <tr>
                                <td class="border px-4 py-2"> {{$item->name}} </td>
                                <td class="border px-4 py-2 text-center w-10"> 
                                    
                                    <div class="flex justify-center">
                                        <a href="{{route('quiz.edit', $item->id)}}">
                                        @include('components.icons.edit')
                                        </a>

                                        <a class="px-3" href="{{route('quiz.show', $item->id)}}">
                                            @include('components.icons.eye')
                                        </a>

                                        <form onsubmit="return confirm('Are you sure?');" action="" wire:submit.prevent="quizDelete({{$item->id}})">
                                            <button  type="submit"> @include('components.icons.trash')</button>
                                        </form>
                                    </div>
                                
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
