<div id="charges-id-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Add charges to <a class="text-red-500">{{$account->student->first_name}}</a></h2>
            <button 
            hx-get="/accounts/{{ $account->id }}/charges"
                    hx-trigger="click"
                    hx-target="#charges-id-{{$account->id}}"
                    hx-swap="outerHTML"
            class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        <form
        hx-post="{{ route('charge.create', ['id' => $account->id]) }}"
        hx-trigger="submit" hx-swap="outerHTML" hx-target="#charges-id-{{$account->id}}">

            <div class="mt-4">
                <label for="title">Title:</label>
                <input type="text" name="title" placeholder="Input title"
                class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="title-error"></div>
            </div>
            <div class="mt-4">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" placeholder="Input amount"
                class="block w-full py-2 px-2 border border-gray-200 rounded">
                <div id="amount-error"></div>
            </div>

            <div id="message"></div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="py-2 px-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Submit</button>

                
                    <button hx-get="/accounts/{{ $account->id }}/charges"
                            hx-trigger="click"
                            hx-target="#charges-id-{{$account->id}}"
                            hx-swap="outerHTML"
                            class="ml-1 py-2 px-4 bg-red-500 hover:bg-red-800 text-red-100 rounded">
                            Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
