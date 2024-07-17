@foreach($accounts as $account)
    <div class="flex justify-between fade-me-out">
        <div class="p-6 m-2 rounded bg-blue-200 shadow-md flex flex-col w-full">
            <div class="text-2xl font-semibold">
                {{ $account->student->first_name }} {{ $account->student->last_name }} {{ $account->student->middle_name }}
            </div>
            <div>Section: {{ $account->section }}</div>
            <div>SY:  {{ $account->remarks }}</div>
            <div class="mt-auto flex justify-end">
                <button 
                    hx-get="/accounts/{{$account->id}}/charges" 
                    hx-target="#account-charges-content" 
                    hx-swap="innerHTML" 
                    class="py-2 px-2 bg-blue-500 hover:bg-blue-800 rounded text-blue-100">
                    View Charges
                </button>

                <button onclick="document.getElementById('charges-add-{{$account->id}}').classList.remove('hidden')" class="py-2 px-2 bg-green-500 hover:bg-green-800 text-green-100 rounded ml-2">Add Charges</button>
            </div>
        </div>
    </div>
   
    @include('modals.charges-add')
    
@endforeach
<div id="account-charges-content"></div>
<div id="account"></div>

