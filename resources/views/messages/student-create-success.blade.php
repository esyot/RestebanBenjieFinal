<div id="student-create-success" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        
            <div class="mt-4 text-center m-2">
                <h2 class="text-lg">Student has been added successfully!</h2>
            </div>

            <div class="flex justify-end">

                <button onclick="closeModal()"
                class="px-4 py-2 bg-red-500 hover:bg-red-500 text-white rounded">OK</button>
            </div>
           
        
    </div>
</div>

<script>
     document.getElementById('student-create').classList.toggle('hidden');

    function closeModal() {

        document.getElementById('student-create-success').classList.toggle('hidden');

        document.getElementById('student-create').classList.add('hidden');
        
        // Clear input fields
        document.querySelectorAll('#student-create input').forEach(input => {
            input.value = '';
        });

        // Clear error messages
        document.querySelectorAll('#student-create .text-red-500').forEach(error => {
            error.textContent = '';
        });


        document.getElementById('message').classList.add('hidden');
    }
</script>
</script>