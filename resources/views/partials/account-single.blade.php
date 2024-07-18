
<div id="account-{{$account->id}}" class="flex w-[100%]">
        <div id="bg" class="p-6 m-2 rounded bg-blue-200 shadow-md flex flex-col w-[100%]">
            <div class="text-2xl font-semibold">
                {{ $account->student->first_name }} {{ $account->student->middle_name }} {{ $account->student->last_name }}
            </div>
            <div>Section: {{ $account->section }}</div>
            <div>SY:  {{ $account->remarks }}</div>
            <div class="flex justify-center">

            
            
            </div>
            <div class="mt-4 flex justify-end">
            <button 
    hx-get="/accounts/{{$account->id}}/charges" 
    hx-target="#account-charges-content" 
    hx-swap="outerHTML" 
    class="py-2 px-4 bg-green-500 hover:bg-green-800 rounded text-green-100">
    <i class="fas fa-eye"></i>
</button>

<button 
                    hx-get="/account/edit/{{$account->id}}" 
                    hx-target="#account-edit-content" 
                    hx-swap="innerHTML" 
                    class="ml-1 py-2 px-4 bg-blue-500 hover:bg-blue-800 rounded text-green-100">
                    <i class="fas fa-edit"></i>
                </button>

<button 
    onclick="document.getElementById('account-delete-{{$account->id}}').classList.remove('hidden')" 
    class="ml-1 text-white py-2 px-4 bg-red-500 hover:bg-red-800 rounded">
    <i class="fas fa-trash-alt"></i> 
</button>

 </div>
        </div>
    </div>
    </div>
   
   
    @include('modals.account-delete')
   