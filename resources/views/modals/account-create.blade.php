<div id="account-create" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Create Account</h2>
            <button onclick="document.getElementById('account-create').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        <form hx-post="{{ route('account.store')}}" hx-trigger="submit" hx-target="#accounts-list" hx-swap="innerHTML">
            <div class="mt-4">
                <label for="student">Student:</label>
                <select name="student" class="block w-full py-2 px-2 border border-gray-200 rounded">
                    @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <label for="section">Section:</label>
                <select name="section" class="block w-full py-2 px-2 border border-gray-200 rounded">
                    <option value="BSIT">BSIT</option>
                    <option value="CABM">CABM-B</option>
                    <option value="CABM">CABM-H</option>
                    <option value="BSCRIM">BSCRIM</option>
                    <option value="BSN">BSN</option>
                    <option value="BSED">BSED</option>
                </select>
                <div id="dob-error"></div>
            </div>
            <div class="mt-4">
                <label for="remarks">Remarks:</label>
                <select name="remarks" class="block w-full py-2 px-2 border border-gray-200 rounded">
                    <option value="2023-2024">2023-2024</option>
                    <option value="2024-2025">2024-2025</option>
                    <option value="2025-2026">2025-2026</option>
                    <option value="2026-2027">2026-2027</option>
                    <option value="2028-2029">2028-2029</option>
                    <option value="2030-2040">2030-2040</option>
                </select>
            </div>
            <div id="message"></div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="py-2 px-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Save</button>
                    
                <button type="button" onclick="document.getElementById('account-create').classList.add('hidden')" class="ml-1 py-2 px-2 bg-gray-500 hover:bg-gray-800 text-gray-100 rounded">Close</button>
            </div>
        </form>
    </div>
</div>
