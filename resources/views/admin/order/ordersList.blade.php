<x-adminLayout>
      <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">OPERATORS</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">DISTANCE</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">EST DELIVERY DUE</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $orders = \App\Models\Order::all()->load('user');
                                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orders[0]->created_at)->format('d M Y');                                  
                                @endphp
                                @foreach ($orders as $order)
                                <tr onclick="window.location='/admin/order/{{$order->id}}/show'">
                                    <th scope="row"><b>{{$order->id}}</b></th>
                                    <td>
                                        @switch(strtolower($order->status))
                                        @case('processing')
                                            <div class="tm-status-circle processing"></div>
                                            {{$order->status}}
                                                @break
                                        @case('delivered')
                                            <div class="tm-status-circle delivered"></div>
                                            {{$order->status}}
                                                @break
                                        @case('declined')
                                            <div class="tm-status-circle declined"></div>
                                            {{$order->status}}
                                                @break
                                        @default
                                            <div class="tm-status-circle pending"></div>
                                            {{$order->status}}
                                        @endswitch
                                    </td>
                                    <td><b>{{$order->user->first_name}}</b></td>
                                    <td><b>{{$order->shipping_address ?? 'London (Example)'}} </b></td>
                                    <td><b>485 km (Example)</b></td>


                                    <td><p>{{ $formattedDate }}</p></td>
                                    <td>08:00, 18 NOV 2024 (for Example) </td>
                                </tr>                                   
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
</x-adminLayout>