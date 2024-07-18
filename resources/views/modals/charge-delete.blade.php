<div id="charge-delete-{{$charge->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Delete <a class="text-red-500">{{$charge->title}}</a></h2>
 
            <button onclick="document.getElementById('charge-delete-{{$charge->id}}').classList.add('hidden')" 
            class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>
            <div class="mt-4">
                <p>Are you sure to delete this charge?</p>
            </div>

            <div class="flex justify-end mt-4">
                <button onclick="document.getElementById('charge-delete-{{$charge->id}}').classList.add('hidden')" 
                hx-get="{{ route('charge.delete', ['id'=>$charge->id, 'accountId'=>$charge->account_id]) }}" 
                hx-trigger="click" 
                hx-swap="innerHTML" 
                hx-target="#charge-{{$charge->id}}" 
                class="py-2 px-2 bg-red-500 text-red-100 hover:bg-red-800 rounded">Yes, proceed.</button>

                <button onclick="document.getElementById('charge-delete-{{$charge->id}}').classList.add('hidden')" class="ml-1 py-2 px-2 bg-gray-500 hover:bg-gray-800 text-gray-100 rounded">No, cancel.</button>
            </div>

           
        
    </div>
</div>