<x-adminLayout>
      <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        @if ($orders?->count())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">OPERATORS</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">TOTAL_AMOUNT</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">EST DELIVERY DUE</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $orders = \App\Models\Order::with('user')->orderBy('created_at', 'desc')->get();
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orders[0]->created_at)->format('d M Y');                                  
                                @endphp

                                @foreach ($orders as $order)
                                <tr onclick="window.location='/admin/order/{{$order->id}}/show'">
                                    <th scope="row"><b>{{$order->id}}</b></th>
                                    <td  class="text-center flex items-center justify-items-center flex-row">
                                        @switch(strtolower($order->status))
                                        @case('processing')
                                            <div class="tm-status-circle processing"></div>
                                            <div>{{$order->status}}</div>
                                                @break
                                        @case('delivered')
                                            <div class="tm-status-circle delivered"></div>
                                            <div>{{$order->status}}</div>
                                                @break
                                        @case('declined')
                                            <div class="tm-status-circle declined"></div>
                                            <div>{{$order->status}}</div>
                                                @break
                                        @default
                                            <div class="tm-status-circle pending"></div>
                                            <div>{{$order->status}}</div>
                                        @endswitch
                                    </td>
                                    <td><b>{{$order->user->first_name . ' ' . $order->user->middle_name . ' ' . $order->user->last_name}}</b></td>
                                    <td><b>{{$order->shipping_address ?? 'London (Example)'}} </b></td>
                                    <td><b>{{$order->phone_number ?? '0912345678 (Example)'}} </b></td>
                                    <td class="text-center"><b>$ {{$order->total_amount}}</b></td>


                                    <td><p>{{ $formattedDate }}</p></td>
                                    <td>08:00, 18 NOV 2024 (for Example) </td>
                                </tr>                                   
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p><strong>No Order For Today!</strong></p>
                        @endif
                    </div>
                </div>
</x-adminLayout>