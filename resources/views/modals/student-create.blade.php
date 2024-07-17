<div id="student-create" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Create Student</h2>
            <button onclick="closeModal()" class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>
        <form hx-post="{{ route('student.create') }}" hx-trigger="submit" hx-target="#students-list" hx-swap="innerHTML">
            <div class="mt-4">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="first_name-error" class="text-red-500"></div>
            </div>

            <div class="mt-4">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="last_name-error" class="text-red-500"></div>
            </div>

            <div class="mt-4">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="middle_name-error" class="text-red-500"></div>
            </div> 

            <div class="mt-4">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="dob-error" class="text-red-500"></div>
            </div>

            <div class="mt-4">
                <label for="address">Address:</label>
                <input type="text" name="address" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="address-error" class="text-red-500"></div>
            </div>

            <div id="message" class="text-green-500"></div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="py-2 px-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Save</button>
                <button type="button" onclick="closeModal()" class="ml-1 py-2 px-2 bg-gray-500 hover:bg-gray-800 text-gray-100 rounded">Close</button>
            </div>
        </form>
    </div>
</div>

<script>
    function closeModal() {
       
        document.getElementById('student-create').classList.add('hidden');
        
     
        document.querySelectorAll('#student-create input').forEach(input => {
            input.value = '';
        });

   
        document.querySelectorAll('#student-create .text-red-500').forEach(error => {
            error.textContent = '';
        });

 
        document.getElementById('message').classList.add('hidden');
    }
</script>
