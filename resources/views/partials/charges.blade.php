<div id="account{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold">
                <a class="text-red-500">
                    {{ $account->student->first_name }} 
                    {{ $account->student->last_name }}'s
                </a>
                Charges
            </h2>
            <button onclick="document.getElementById('charges-add').classList.remove('hidden')" 
                class="py-2 px-2 bg-green-500 hover:bg-green-800 text-green-100 rounded">Add Charges</button>
        </div>

        <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-200 text-gray-600">
                <tr>
                    <th class="py-2 px-4 border">Title</th>
                    <th class="py-2 px-4 border">Amount</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody id="charges-list-{{$account->id}}">
                @php
                    $totalAmount = 0;
                @endphp

                @foreach($account->charges as $charge)
                    <tr id="charge-{{$charge->id}}" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">{{ $charge->title }}</td>
                        <td class="py-2 px-4 border">₱{{ $charge->amount }}</td>
                        <td class="py-2 px-4 border text-center">
                            <button onclick="document.getElementById('charge-edit').classList.remove('hidden')" class="py-2 px-2 text-blue-500 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="document.getElementById('charge-delete-{{$charge->id}}').classList.remove('hidden')" class="py-2 px-2 text-red-500 hover:text-red-800">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                        @php
                            $totalAmount += $charge->amount;
                        @endphp
                    </tr>
                    @include('modals.charge-delete')
                    @include('modals.charge-edit')
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="py-2 px-4 border font-semibold">Total:</td>  
                    <td class="py-2 px-4 text-red-500 border font-semibold">₱{{ $totalAmount }}</td>
                    <td class="py-2 px-4 border"></td>
                </tr>
            </tfoot>
        </table>

        <div class="flex justify-end">
            <button class="mt-4 px-4 text-white py-2 bg-blue-500 hover:bg-blue-800 rounded">Pay</button>
            <button onclick="document.getElementById('account{{$account->id}}').classList.add('hidden')" class="mt-4 ml-1 py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded">Close</button>
        </div>
    </div>
</div>

@include('modals.charges-add', ['accountId' => $account->id])
