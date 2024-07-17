
    @foreach($students as $student)
            <div id="student-{{$student->id}}" class="flex justify-between fade-me-out">
                <div class="p-6 m-2 rounded bg-blue-200 shadow-md flex flex-col w-[100%]">
                    <div class="text-2xl font-semibold">{{ $student->first_name }} {{ $student->last_name }} {{ $student->middle_name }}</div>
                    <div>Date of Birth: {{ $student->DOB }}</div>
                    <div>Address: {{ $student->address }}</div>
                    
                    <div class="mt-auto flex justify-end">
                    <button hx-get="{{ route('student.view', ['id'=>$student->id]) }}" hx-target='#student'
                        class="py-2 px-2 bg-blue-500 hover:bg-blue-800 rounded text-blue-100">View & Edit</button>

                    <button onclick="document.getElementById('student-delete-{{$student->id}}').classList.remove('hidden')" 
                        class="py-2 px-2 ml-1 bg-red-500 hover:bg-red-800 text-red-100 rounded">Delete</button>
                </div>
                </div>
                 
               

                @include('modals.student-delete')
               
                

            </div>
        @endforeach

        
           
    </div>