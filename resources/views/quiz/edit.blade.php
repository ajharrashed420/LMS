<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="text-xl font-bold text-gray-600">{{$id->name}}</h2>
            <a href="{{route('quiz.index')}}" class="lms-button">Add New Quiz</a>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:quiz-edit :quiz="$id"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
