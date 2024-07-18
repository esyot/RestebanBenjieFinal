<div id="charge-add-modal"></div>
<div id="charges-list-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold">
                <a class="text-red-500">
                    {{ $account->student->first_name }}
                    {{ $account->student->last_name }}'s
                </a>
                Charges
            </h2>


        <button hx-get="/charge/modal/{{$account->id}}"
            hx-trigger="click"
            hx-target="#charges-list-{{$account->id}}"
            hx-swap="outerHTML"
            class="py-2 px-4 bg-green-500 hover:bg-green-800 text-green-100 rounded">
            <i class="fas fa-add"></i>
        </button>

        </div>

        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-200 text-gray-600">
                <tr>
                    <th class="py-2 px-4 border">Title</th>
                    <th class="py-2 px-4 border">Amount</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody >

                    @include('partials.charges-list')
            </tbody>

        </table>

        <div class="flex justify-end items-center mt-2">
            <h2 class="text-xl">Total: </h2>
            <h2 id="totalAmount" class="text-xl text-red-500 ml-1"> ₱{{$totalAmount}}</h2>

        </div>

        <div class="flex justify-end">
            <button hx-get="/account/pay/{{$account->id}}/{{$account->remarks}}" hx-trigger="click"
            hx-target="#charges-list-{{$account->id}}" hx-swap="innerHTML"
            class="mt-4 px-4 text-white py-2 bg-blue-500 hover:bg-blue-800 rounded">Pay</button>

            <button onclick="document.getElementById('charges-list-{{$account->id}}').classList.add('hidden')" class="mt-4 ml-1 py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded">Close</button>
        </div>
    </div>
</div>

