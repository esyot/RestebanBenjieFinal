<div id="charge-edit" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Edit Charges</h2>

            <button onclick="document.getElementById('charge-edit').classList.add('hidden')" class="text-gray-500 hover-text-gray-700">&times;</button>
        </div>


        <form hx-put="{{ route('charge.update',['id' => $charge->id]) }}"
            hx-trigger="submit"
            hx-target="#charge-edit"
            hx-swap="outerHTML">

            <div class="mt-4">
                <label for="title">Title:</label>
               <input type="text" value="{{$charge->title}}" name="title" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="first_name-error"></div>
            </div>

            <div class="mt-4">
                <label for="amount">Amount:</label>
               <input type="text" value="{{$charge->amount}}" name="amount" class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="last_name-error"></div>
            </div>

            <div class="flex justify-end mt-2">

                <button type="submit" class="text-white py-2 px-4 bg-blue-500 hover:bg-blue-800 rounded">Update</button>

                <div class="flex justify-end">
                    <button hx-get="/accounts/{{ $charge->account_id }}/charges"
                    hx-trigger="click"
                    hx-target="#charge-edit"
                    hx-swap="outerHTML"
                    class="ml-1 py-2 px-4 bg-red-500 hover:bg-red-800 text-red-100 rounded">Close</button>
                </div>
            <div id="message"></div>


            </form>





    </div>
</div>
