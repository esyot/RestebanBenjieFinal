<!-- resources/views/partials/charges.blade.php -->
<div id="account{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">
        <h2 class="text-xl font-semibold mb-4"><a class="text-red-500">{{ $account->student->first_name }} {{ $account->student->last_name }}'s<a> Charges</h2>
        <table class="min-w-full bg-white border rounded-lg">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-2 px-4 border">Title</th>
                        <th class="py-2 px-4 border">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($account->charges as $charge)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border">{{ $charge->title }}</td>
                            <td class="py-2 px-4 border">{{ $charge->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="flex justify-end">
            <button class="mt-4 px-4 text-white py-2 bg-blue-500 hover:bg-blue-800 rounded">Pay</button>
            <button onclick="document.getElementById('account{{$account->id}}').classList.add('hidden')" 
            class="mt-4 ml-1 py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded">Close</button>
        </div>
        
    </div>
</div>
