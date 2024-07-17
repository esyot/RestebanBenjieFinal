<div id="student-delete-success{{$id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        
            <div class="mt-4 text-center">
                <h2 class="text-xl m-2">Student has been deleted successfully!</h2>
            </div>

            <div class="flex justify-end mb-2">

                <button type="button" class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded"
                onclick="document.getElementById('student-delete-success{{$id}}').classList.toggle('hidden')" >OK</button>
            </div>
           
        
    </div>
</div>