<div id="account-edit-{{$account->id}}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Edit <span class="text-red-500">{{$account->student->first_name}} {{$account->student->last_name}}</span></h2>
 
            <button onclick="document.getElementById('account-edit-{{$account->id}}').classList.add('hidden')" 
            class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        <div class="mt-4">
            <form onsubmit="document.getElementById('account-edit-{{$account->id}}').classList.add('hidden')"
            hx-put="{{ route('account.update', ['id' => $account->id]) }}"
                hx-trigger="submit"
                hx-target="#account-{{$account->id}}"
                hx-swap="outerHTML">

                <label for="section">Section:</label>
                <select name="section" class="block w-full py-2 px-2 border border-gray-200 rounded">
                    <option value="{{$account->section}}">{{$account->section}}</option>
                    <option value="BSIT">BSIT</option>
                    <option value="CABM-B">CABM-B</option>
                    <option value="CABM-H">CABM-H</option>
                    <option value="BSCRIM">BSCRIM</option>
                    <option value="BSN">BSN</option>
                    <option value="BSED">BSED</option>
                </select>

                <div class="mt-4">
                    <label for="remarks">Remarks:</label>
                    <select name="remarks" class="block w-full py-2 px-2 border border-gray-200 rounded">
                        <option value="{{$account->remarks}}">{{$account->remarks}}</option>
                        <option value="2023-2024">2023-2024</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2025-2026">2025-2026</option>
                        <option value="2026-2027">2026-2027</option>
                        <option value="2028-2029">2028-2029</option>
                        <option value="2030-2040">2030-2040</option>
                    </select>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-800 rounded text-blue-100">Update</button>
                    <button onclick="document.getElementById('account-edit-{{$account->id}}').classList.add('hidden')"
                    type="button" class="ml-1 py-2 px-4 bg-gray-500 hover:bg-gray-800 rounded text-gray-100">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('modals.account-delete')
