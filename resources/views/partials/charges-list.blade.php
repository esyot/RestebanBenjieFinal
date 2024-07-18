    @foreach($charges as $charge)
                    <tr id="charge-{{$charge->id}}" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border">{{ $charge->title }}</td>
                        <td class="py-2 px-4 border">₱{{ $charge->amount }}</td>
                        <td class="py-2 px-4 border text-center">
                            <button hx-get="/charge/{{$charge->id}}" 
                            hx-trigger="click" 
                            hx-target="#charges-list-{{$charge->account_id}}" 
                            hx-swap="innerHTML" 
                            
                            class="py-2 px-2 text-blue-500 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="document.getElementById('charge-delete-{{$charge->id}}').classList.remove('hidden')" class="py-2 px-2 text-red-500 hover:text-red-800">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                      
                    </tr>
                        @include('modals.charge-delete')
                       
@endforeach
