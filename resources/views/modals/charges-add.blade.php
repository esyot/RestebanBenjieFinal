<div id="charges-add-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Add Charges to {{$account->student->first_name}}</a></h2>
 
            <button onclick="document.getElementById('charges-add-{{$account->id}}').classList.add('hidden')" class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>
        <form hx-post="{{ route('charges.add', $account->id) }}" hx-trigger="submit" hx-target="#accounts-list" hx-swap="innerHTML">
            
        

            <div class="mt-4">
                <label for="title">Title:</label>
               <input type="text" name="title" class="block w-full py-2 px-2 border border-gray-200 rounded">
               <div id="middle_name-error"></div>
            </div> 

            <div class="mt-4">
                <label for="amount">Amount: </label>
               <input type="text" name="amount" class="block w-full py-2 px-2 border border-gray-200 rounded">
               <div id="dob-error"></div>
            </div>

           

            <div id="message"></div>

            
            <div class="flex justify-end mt-4">

                <button type="submit" class="py-2 px-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Save</button>
                <button type="button" onclick="document.getElementById('charges-add-{{$account->id}}').classList.add('hidden')" 
                    class="ml-1 py-2 px-2 bg-gray-500 hover:bg-gray-800 text-gray-100 rounded">Close</button>
          
            </div>
            </form>
        
    </div>
</div>