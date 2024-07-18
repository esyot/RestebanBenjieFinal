<div id="payment-add-error" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">


            <div class="mt-4 text-center">

                <p class="text-xl text-red-500">Error!</p>
                <div class="flex justify-center">
                    <ul class="list-disc list-inside text-left">
                        <li class="mb-2">Amount is required</li>
                        <li class="mb-2">Amount must be numeric</li>
                    </ul>
                </div>
            </div>

            <div class="flex justify-end">

            

            <button type="button" hx-get="/account/pay/{{$account->id}}/{{$account->remarks}}"
                            hx-trigger="click"
                            hx-target="#payment-add-error"
                            hx-swap="outerHTML"
                            class="ml-1 py-2 px-4 bg-red-500 hover:bg-red-800 text-red-100 rounded">
                            Close
                    </button>
            </div>

    </div>
</div>
