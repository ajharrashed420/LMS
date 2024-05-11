
<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{$curriculum->course->name}}</h1>
    <p class="mb-4 italic">Price: ${{$curriculum->course->price}}</p>
    <p class="pb-6">{{$curriculum->course->description}}</p>


    <h2 class="font-bold mb-2">Class</h2>
    <p class="text-gray-600 mb-4"><span>Name: </span>{{$curriculum->name}}</p>
    <h2 class="font-bold mb-2">Students - Present: {{$curriculum->presentStudent()}} || Absent: {{$curriculum->course->students()->count()-$curriculum->presentStudent()}}</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Attendance</th>
        </tr>

        @foreach ($curriculum->course->students as $student)
            <tr>
                <td class="border px-4 py-2">{{$student->name}}</td>
                <td class="border px-4 py-2">{{$student->email}}</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-center gap-4">
                        @if ($student->is_present($curriculum->id))
                            Present
                        @else
                            <button wire:click="attendance({{$student->id}})" class="py-1 px-3 rounded bg-green-500 text-white">Present</button>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>


    <h2 class="text-xl font-bold text-gray-700 mt-10 mb-3">Notes</h2>
    <div>
        <ul class="flex divide-y flex-col px-4">
            @foreach ($curriculum->notes as $note)
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
