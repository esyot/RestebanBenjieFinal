<div class="grid grid-cols-3 gap-3 min-h-auto w-full p-6">
        @foreach($students as $student)
            <div class="flex justify-between">
                <div class="p-6 m-2 rounded bg-blue-200 shadow-md flex flex-col">
                    <div class="text-xl font-semibold">{{ $student->first_name }} {{ $student->last_name }} {{ $student->middle_name }}</div>
                    <div>Date of Birth: {{ $student->DOB }}</div>
                    <div>Address: {{ $student->address }}</div>

                    <div class="mt-auto flex justify-end">
                    <button onclick="document.getElementById('student-edit-{{$student->id}}').classList.remove('hidden')"
                        class="py-2 px-2 bg-blue-500 hover:bg-blue-800 rounded text-blue-100">Edit</button>
                    <button onclick="document.getElementById('student-delete-{{$student->id}}').classList.remove('hidden')" 
                        class="py-2 px-2 ml-1 bg-red-500 hover:bg-red-800 text-red-100 rounded">Delete</button>
                </div>
                </div>

                @include('modals.student-delete')
                @include('modals.student-edit')
            </div>
        @endforeach
    </div>