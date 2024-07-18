<div id="account-delete-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Delete <a class="text-red-500">{{$account->student->first_name}}</a></h2>
 
            <button onclick="document.getElementById('account-delete-{{$account->id}}').classList.add('hidden')" 
            class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>
            <div class="mt-4">
                <p>Are you sure to delete this account?</p>
            </div>

            <div class="flex justify-end mt-4">

                <button onclick="document.getElementById('account-delete-{{$account->id}}').classList.add('hidden')"
                hx-delete="{{ route('account.delete', ['id'=>$account->id]) }}" 
                hx-trigger="click" 
                hx-target="#account-{{$account->id}}"
                hx-swap="outerHTML"
                class="py-2 px-4 text-red-100 bg-red-500 hover:bg-red-800 rounded shadow-md">Yes, proceed</button>
                
                <button onclick="document.getElementById('account-delete-{{$account->id}}').classList.add('hidden')"
                class="ml-1 py-2 px-4 text-gray-100 bg-gray-500 hover:bg-gray-800 rounded shadow-md">No, cancel</button>
            </div>

           
        
    </div>
</div>