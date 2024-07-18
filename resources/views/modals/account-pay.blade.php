<div id="account-pay-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg w-full p-4 max-w-5xl">
        
        
        <div class="flex space-x-8">
    
          
            <div class="w-1/2">
                <div class="flex items-center">
                    <h2 class="text-2xl font-semibold text-center">Payment Form</h2>
                </div>

                <div class="mt-4">
                 
                 <h2> Student ID: <a class="text-blue-500">{{$account->id}}</a></h2>
             </div>

                <div class="mt-4">
                 
                 <h2> Name: <a class="text-blue-500">{{$account->student->last_name}}, {{$account->student->first_name}} {{$account->student->middle_name}}</a></h2>
             </div>

              

                <form hx-post="{{ route('payment.add', ['id'=>$account->id]) }}" 
                hx-trigger="submit" 
                hx-swap="outerHTML" 
                hx-target="#account-pay-{{$account->id}}">
                   
                    <div class="mt-4">
                        <label for="payment">Payment Amount:</label>
                        <input type="text" placeholder="Input payment amount" name="payment_amount" class="block w-full py-2 px-2 border border-gray-200 rounded">
                        <input type="hidden" name="account_id" value="{{ $account->id }}">
                        <input type="hidden" name="remaining_balance" value="{{ $remainingBalance }}">
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="py-2 px-4 text-blue-100 bg-blue-500 hover:bg-blue-800 rounded shadow-md">Submit</button>
                        </form>
                        <button type="button" hx-get="/accounts/{{ $account->id }}/charges"
                            hx-trigger="click"
                            hx-target="#account-pay-{{$account->id}}"
                            hx-swap="outerHTML"
                            class="ml-1 py-2 px-4 bg-red-500 hover:bg-red-800 text-red-100 rounded">
                            Close
                    </button>
                    
                    </div>
                
            </div>

            <!-- Payments Table -->
            <div class="w-1/2">
            <div class="flex items-center">
                    <h2 class="text-2xl font-semibold text-center">Billing Statement</h2>
                </div>

            <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border bg-gray-200">Charges</th>
                            <th class="py-2 px-4 border bg-gray-200">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($charges as $charge)
                            <tr id="charge-{{$charge->id}}" class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">{{ $charge->title }}</td>
                                <td class="py-2 px-4 border">₱{{ $charge->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="py-2 px-4 border">
                            <td class="py-2 px-4 border">Total Amount:</td>
                            <td class="py-2 px-4 border">
                                <p class="text-red-500 font-semibold">₱{{ $totalAmount }}</p>
                            </td>
                        </tr>
                        <tr class="py-2 px-4 border">
                            <td class="py-2 px-4 border">Remaining Balance:</td>
                            <td class="py-2 px-4 border">
                                <p class="text-green-500 font-semibold">₱{{ $remainingBalance }}</p>
                            </td>
                        </tr>
                    </tfoot>
                </table>



                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border bg-gray-200">Amount</th>
                            <th class="py-2 px-4 border bg-gray-200">Date Paid</th>
                        </tr>
                    </thead>
                    <tbody id="payments-list-{{$account->id}}">
                        
                     @include('partials.payments-list')
                        <tr class="py-2 px-4 border">
                            <td class="py-2 px-4 border">Remaining Balance:</td>
                            <td class="py-2 px-4 border">
                                <p class="text-green-500 font-semibold">₱{{ $remainingBalance }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
