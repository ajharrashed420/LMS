
<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{$curriculum->course->name}}</h1>
    <p class="mb-4 italic">Price: ${{$curriculum->course->price}}</p>
    <p class="pb-6">{{$curriculum->course->description}}</p>


    <h2 class="font-bold mb-2">Class</h2>
    <p class="text-gray-600 mb-4"><span>Name: </span>{{$curriculum->name}}</p>
    <h2 class="font-bold mb-2">Students</h2>
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
                        <a href="" class="py-2 px-3 bg-green-500 text-white">Present</a>
                        <a href="" class="py-2 px-3 bg-red-500 text-white">Absent</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

</div>
