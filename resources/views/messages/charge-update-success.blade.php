<div id="charge-update-success" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">


<div class="text-xl text-green-500 text-center rounded mb-2 m-2">Charge has been updated successfully!</div>

<div class="flex justify-end">
    <button hx-get="/accounts/{{ $account->id }}/charges"
    hx-trigger="click"
    hx-target="#charge-update-success"
    hx-swap="outerHTML"
    class="py-2 px-4 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">OK</button>
</div>
</div>
</div>
