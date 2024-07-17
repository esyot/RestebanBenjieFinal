<div id="student-edit" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Edit <a class="text-red-500">{{$student->first_name}} {{$student->last_name}}</a></h2>
 
            <button onclick="document.getElementById('student-edit-{{$student->id}}').classList.add('hidden')" class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>
        
        <form hx-put="{{ route('student.update',['id'=>$student->id]) }}" hx-trigger="submit" hx-swap="innerHTML" hx-target="#students-list">
                         
            <div class="mt-4">
                <label for="first_name">First Name:</label>
               <input type="text" value="{{$student->first_name}}" name="first_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="first_name-error"></div>
            </div>

            <div class="mt-4">
                <label for="last_name">Last Name:</label>
               <input type="text" value="{{$student->last_name}}" name="last_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="last_name-error"></div>
            </div>

            <div class="mt-4">
                <label for="middle_name">Middle Name:</label>
               <input type="text" value="{{$student->middle_name}}" name="middle_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="middle_name-error"></div>
            </div>

            <div class="mt-4">
                <label for="dob">Date of Birth:</label>
               <input type="date" value="{{$student->DOB}}" name="dob" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="dob-error"></div>
            </div>

            <div class="mt-4">
                <label for="address">Address:</label>
               <input type="text" value="{{$student->address}}" name="address" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="address-error"></div>
            </div>

            <div id="message"></div>

            

            
            <div class="flex justify-end mt-4">

                <button type="submit" class="py-2 px-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Save</button>
                <button type="button" onclick="document.getElementById('student-edit').classList.add('hidden')" class="ml-1 py-2 px-2 bg-gray-500 hover:bg-gray-800 text-gray-100 rounded">Close</button>
          
            </div>
            </form>
        
    </div>
</div>