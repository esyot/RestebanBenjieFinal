<div id="account-create-success" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        
            <div class="mt-4 text-center m-2">
                <h2 class="text-lg">Account has been added successfully!</h2>
            </div>

            <div class="flex justify-end">

                <button onclick="closeModal()"
                class="px-4 py-2 bg-red-500 hover:bg-red-500 text-white rounded">OK</button>
            </div>
           
        
    </div>
</div>

<script>
     document.getElementById('account-create').classList.add('hidden');

    function closeModal() {

        document.getElementById('account-create-success').classList.add('hidden');
    }
</script>
</script>