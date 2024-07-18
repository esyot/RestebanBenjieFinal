<div id="charge-add-error" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">


            <div class="mt-4 text-center">

                <p class="text-xl text-red-500">All fields are required!</p>
                <div class="flex justify-center">
                    <ul class="list-disc list-inside text-left">
                        <li class="mb-2">Title must be a string</li>
                        <li class="mb-2">Amount must be numeric</li>
                    </ul>
                </div>
            </div>

            <div class="flex justify-end">

                <button onclick="document.getElementById('charge-add-error').classList.add('hidden')"
                class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded">OK</button>
            </div>


    </div>
</div>
