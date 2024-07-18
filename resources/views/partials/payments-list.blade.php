                        @foreach($payments as $payment)
                            <tr id="payment-{{$payment->id}}" class="hover:bg-gray-100">
                                <td class="py-2 px-4 border">₱{{ $payment->amount_paid }}</td>
                                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($payment->date)->format('m-d-Y') }}</td>
                            </tr>
                        @endforeach